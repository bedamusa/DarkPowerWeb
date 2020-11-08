<?php


namespace DarkPowerWeb\Core;


class Application
{
    private $context;
    private $router;
    private $uri;
    private $serverInfo;
    private $dependencies = [];
    private $resolvedDependencies = [];

    public function __construct(ContextInterface $context, $uri, $serverInfo, $router)
    {
        $this->context = $context;
        $this->router = $router;
        $this->uri = $uri;
        $this->serverInfo = $serverInfo;
        $this->dependencies[ContextInterface::class] = get_class($context);
        $this->resolvedDependencies[get_class($context)] = $context;
    }


    public function start()
    {
        $fullControllerName = 'DarkPowerWeb\Controller\\' .
            ucfirst($this->context->getControllerName()) . 'Controller';

        if (!class_exists($fullControllerName) || !method_exists($fullControllerName,
                $this->context->getActionName())) {
            echo '404 Not Found';
            exit;
        }
        $controllerInstance = $this->resolve($fullControllerName);
        $getParams = $this->context->getParams();
        $paramsCount = count($getParams);
        $methodParams = array_merge([], $getParams);
        $methodInfo = new \ReflectionMethod($controllerInstance, $this->context->getActionName());
        $paramsInfo = $methodInfo->getParameters();

        for ($i = $paramsCount; $i < count($paramsInfo); $i++) {
            $param = $paramsInfo[$i];
            $paramInterface = $param->getClass();
            $paramInterfaceName = $paramInterface->getName();
            if (key_exists($paramInterfaceName, $this->dependencies)) {
                $paramClassName = $this->dependencies[$paramInterfaceName];
                $paramInstance = $this->resolve($paramClassName);
                $methodParams[] = $paramInstance;
            }else {
                $object = new $paramInterfaceName();
                $this->bindData($_POST, $object);
                $methodParams[] = $object;
            }
        }

        call_user_func_array([$controllerInstance, $this->context->getActionName()], $methodParams);
    }

    public function addClass(string $className, $object) {
        $this->registerDependency($className, get_class($object));
        $this->resolvedDependencies[$className] = $object;
    }

    public function registerDependency($abstraction, $inplementation)
    {
        $this->dependencies[$abstraction] = $inplementation;
    }

    public function resolve($className)
    {
        if (key_exists($className, $this->resolvedDependencies)) {
            return $this->resolvedDependencies[$className];
        }
        $classInfo = new \ReflectionClass($className);
        $constructor = $classInfo->getConstructor();
        if ($constructor === null) {
            $object = new $className;
            $this->resolvedDependencies[$className] = $object;
            return $object;
        }
        $params = $constructor->getParameters();
        $resolvedParams = [];
        for ($i = 0; $i < count($params); $i++) {
            $parameter = $params[$i];
            $dependencyInterface = $parameter->getClass();
            if (key_exists($dependencyInterface->getName(), $this->resolvedDependencies)){
                $resolvedParams[] = $this->resolvedDependencies[$dependencyInterface->getName()];
            }else {
                $dependencyClass = $this->dependencies[$dependencyInterface->getName()];
                $depedencyInstance = $this->resolve($dependencyClass);
                $resolvedParams[] = $depedencyInstance;
            }
        }
        $object = $classInfo->newInstanceArgs($resolvedParams);
        $this->resolvedDependencies[$className] = $object;
        return $object;
    }

    private function bindData(array $data, $object) {
        $classinfo = new \ReflectionClass($object);
        $fields = $classinfo->getProperties();
        foreach ($fields as $field) {
            $field->setAccessible(true);
            if (key_exists($field->getName(), $data)) {
                $field->setValue($object, $data[$field->getName()]);
            }
        }
    }

}