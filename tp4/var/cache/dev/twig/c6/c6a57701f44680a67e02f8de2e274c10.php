<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* inc/navbar.html.twig */
class __TwigTemplate_1da9b35d3cf7a49da04194d2a02387a9 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "inc/navbar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "inc/navbar.html.twig"));

        // line 1
        echo "<nav class=\"navbar navbar-expand-sm navbar-dark bg-primary mb-3\"> 
<div class=\"container\">
<a href=\"/\" class=\"navbar-brand\">Nadhem BelHadj</a> <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#mobile-nav\"> <span class=\"navbar-toggle-icon\"></span> </button> <div class=\"collapse navbar-collapse\" id=\"mobile-nav\"> <ul class=\"navbar-nav ml-auto\"> <li class=\"nav-item\"> <a href=\"/\" class=\"nav-link\">Home</a> </li> <li class=\"nav-item\"> <a href=\"#\" class=\"nav-link\">Ajouter article</a> </li> </ul> </div> </div> </nav>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "inc/navbar.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav class=\"navbar navbar-expand-sm navbar-dark bg-primary mb-3\"> 
<div class=\"container\">
<a href=\"/\" class=\"navbar-brand\">Nadhem BelHadj</a> <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#mobile-nav\"> <span class=\"navbar-toggle-icon\"></span> </button> <div class=\"collapse navbar-collapse\" id=\"mobile-nav\"> <ul class=\"navbar-nav ml-auto\"> <li class=\"nav-item\"> <a href=\"/\" class=\"nav-link\">Home</a> </li> <li class=\"nav-item\"> <a href=\"#\" class=\"nav-link\">Ajouter article</a> </li> </ul> </div> </div> </nav>", "inc/navbar.html.twig", "C:\\Users\\farah\\Downloads\\Symfony-main (1)\\Symfony-main\\tp4\\tp4\\templates\\inc\\navbar.html.twig");
    }
}
