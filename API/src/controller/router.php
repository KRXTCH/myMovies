<?php



class Router
{
    private function route($route, $path_to_include, $functionToUse)
    {
        $callback = $path_to_include;
        if (!is_callable($callback)) {
            if (!strpos($path_to_include, '.php')) {
                $path_to_include .= '.php';
            }
        }

        $request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
        $request_url = rtrim($request_url, '/');
        $request_url = strtok($request_url, '?');
        $route_parts = explode('/', $route);
        $request_url_parts = explode('/', $request_url);

        array_shift($route_parts);
        array_shift($request_url_parts);

        // Pour le moment ca car apres ca va plus etre /api/index.php
        if (true) {
            include_once __DIR__ . "/$path_to_include";
            exit();
        }


        if ($route_parts[0] == '' && count($request_url_parts) == 0) {
            include_once __DIR__ . "/$path_to_include";
            exit();
        }

        if (count($route_parts) != count($request_url_parts)) {
            return;
        }
        $parameters = [];
        for ($__i__ = 0; $__i__ < count($route_parts); $__i__++) {
            $route_part = $route_parts[$__i__];
            if (preg_match("/^[$]/", $route_part)) {
                $route_part = ltrim($route_part, '$');
                array_push($parameters, $request_url_parts[$__i__]);
                $route_part = $request_url_parts[$__i__];
            } else if ($route_parts[$__i__] != $request_url_parts[$__i__]) {
                return;
            }
        }
        // Callback function
        if (is_callable($callback)) {
            call_user_func_array($callback, $parameters);
            exit();
        }
        include_once __DIR__ . "/$path_to_include";
        echo __DIR__ . "/$path_to_include";
        exit();
    }

    public function get($route, $path_to_include)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->route($route, $path_to_include);
        }
    }
    public function post($route, $path_to_include)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->route($route, $path_to_include);
        }
    }
    public function put($route, $path_to_include)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $this->route($route, $path_to_include);
        }
    }
    public function patch($route, $path_to_include)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
            $this->route($route, $path_to_include);
        }
    }
    public function delete($route, $path_to_include)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $this->route($route, $path_to_include);
        }
    }
    public function any($route, $path_to_include)
    {
        $this->route($route, $path_to_include);
    }

    // function out($text)
    // {
    //     echo htmlspecialchars($text);
    // }
    // function set_csrf()
    // {
    //     if (!isset($_SESSION["csrf"])) {
    //         $_SESSION["csrf"] = bin2hex(random_bytes(50));
    //     }
    //     echo '<input type="hidden" name="csrf" value="' . $_SESSION["csrf"] . '">';
    // }
    // function is_csrf_valid()
    // {
    //     if (!isset($_SESSION['csrf']) || !isset($_POST['csrf'])) {
    //         return false;
    //     }
    //     if ($_SESSION['csrf'] != $_POST['csrf']) {
    //         return false;
    //     }
    //     return true;
    // }
}