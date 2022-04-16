<?php


namespace App\Helpers\UI;


class Routing
{
    /**
     * Generate the URL to a named route with prefix to the administration section.
     * @param string $name
     * @param mixed $parameters
     * @param bool $absolute
     * @return string
     */
    public static function url(string $name, $parameters = [], bool $absolute = true): string
    {
        $adminPrefix = config('app.admin_prefix');
        return app('url')->route($adminPrefix . '.' . $name, $parameters, $absolute);
    }

    /**
     * @param  string|null  $to
     * @param  int  $status
     * @param  array  $headers
     * @param  bool|null  $secure
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public static function redirect(
        ?string $to = null,
        int $status = 302,
        array $headers = [],
        ?bool $secure = null
    )
    {
        $to = config('app.admin_prefix') . '/' . $to;

        return app('redirect')->to($to, $status, $headers, $secure);
    }
}
