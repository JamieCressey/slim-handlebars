<?php
/**
 * Slim Handlebars - a Handlebars view class for Slim
 *
 * @author      Jamie Cressey
 * @link        http://github.com/jayc89/Slim-Handlebars
 * @version     0.0.1
 * @package     SlimHandlebars
 *
 * MIT LICENSE
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
namespace Slim\Handlebars;

/**
 * Handlebars view
 *
 * The Handlebars view is a custom View class that renders templates using the Handlebars
 * template language (https://github.com/mardix/Handlebars).
 *
 */
class Handlebars extends \Slim\View
{
    /**
     * @var Handlebars The Handlebars engine for rendering templates.
     */
    private $parserInstance = null;

    /**
     * Render Handlebars Template
     *
     * This method will output the rendered template content
     *
     * @param   string $template The path to the Handlebars template, relative to the templates directory.
     * @param null $data
     * @return  void
     */
    public function render($template, $data = null)
    {
        $env = $this->getInstance();
        $parser = $env->loadTemplate($template);

        return $parser->render($this->all());
    }

    /**
     * Creates new Handlebars Engine if it doesn't already exist, and returns it.
     *
     * @return \Handlebars
     */
    public function getInstance()
    {
        if (!$this->parserInstance) {

            $partialsLoader = new \Handlebars\Loader\FilesystemLoader($this->getTemplatesDirectory(),
                [
                    "extension" => "html"
                ]
            );
            $this->parserInstance = new \Handlebars\Handlebars([ "loader" => $partialsLoader, "partials_loader" => $partialsLoader ]);
        }

        return $this->parserInstance;
    }
}
