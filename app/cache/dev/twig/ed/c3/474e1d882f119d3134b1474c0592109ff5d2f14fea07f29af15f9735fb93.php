<?php

/* WebProfilerBundle:Profiler:results.html.twig */
class __TwigTemplate_edc3474e1d882f119d3134b1474c0592109ff5d2f14fea07f29af15f9735fb93 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@WebProfiler/Profiler/layout.html.twig");

        $this->blocks = array(
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_panel($context, array $blocks = array())
    {
        // line 4
        echo "    <h2>Search Results</h2>

    ";
        // line 6
        if ((isset($context["tokens"]) ? $context["tokens"] : $this->getContext($context, "tokens"))) {
            // line 7
            echo "        <table>
            <thead>
                <tr>
                    <th scope=\"col\">Token</th>
                    <th scope=\"col\">IP</th>
                    <th scope=\"col\">Method</th>
                    <th scope=\"col\">URL</th>
                    <th scope=\"col\">Time</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 18
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tokens"]) ? $context["tokens"] : $this->getContext($context, "tokens")));
            foreach ($context['_seq'] as $context["_key"] => $context["elements"]) {
                // line 19
                echo "                    <tr>
                        <td><a href=\"";
                // line 20
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("token" => $this->getAttribute((isset($context["elements"]) ? $context["elements"] : $this->getContext($context, "elements")), "token"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["elements"]) ? $context["elements"] : $this->getContext($context, "elements")), "token"), "html", null, true);
                echo "</a></td>
                        <td>";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["elements"]) ? $context["elements"] : $this->getContext($context, "elements")), "ip"), "html", null, true);
                echo "</td>
                        <td>";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["elements"]) ? $context["elements"] : $this->getContext($context, "elements")), "method"), "html", null, true);
                echo "</td>
                        <td>";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["elements"]) ? $context["elements"] : $this->getContext($context, "elements")), "url"), "html", null, true);
                echo "</td>
                        <td>";
                // line 24
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["elements"]) ? $context["elements"] : $this->getContext($context, "elements")), "time"), "r"), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['elements'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "            </tbody>
        </table>
    ";
        } else {
            // line 30
            echo "        <p>
            <em>The query returned no result.</em>
        </p>
    ";
        }
        // line 34
        echo "
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:results.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 11,  20 => 1,  792 => 488,  775 => 485,  749 => 479,  746 => 478,  727 => 476,  710 => 475,  690 => 469,  679 => 466,  677 => 465,  649 => 462,  634 => 456,  625 => 453,  620 => 451,  606 => 449,  549 => 411,  532 => 410,  529 => 409,  522 => 406,  517 => 404,  202 => 94,  386 => 159,  378 => 157,  367 => 155,  363 => 153,  358 => 151,  345 => 147,  343 => 146,  340 => 145,  331 => 140,  307 => 128,  302 => 125,  296 => 121,  288 => 118,  259 => 103,  253 => 100,  184 => 63,  175 => 58,  170 => 84,  34 => 5,  417 => 143,  411 => 140,  405 => 137,  395 => 135,  388 => 134,  382 => 131,  371 => 156,  359 => 123,  356 => 122,  353 => 149,  350 => 120,  347 => 119,  333 => 115,  324 => 112,  313 => 110,  308 => 109,  281 => 114,  274 => 110,  234 => 90,  210 => 77,  180 => 70,  155 => 47,  152 => 46,  1077 => 657,  1073 => 656,  1069 => 654,  1064 => 651,  1055 => 648,  1051 => 647,  1048 => 646,  1044 => 645,  1035 => 639,  1023 => 632,  1021 => 631,  1013 => 627,  1004 => 624,  1000 => 623,  993 => 621,  984 => 615,  975 => 609,  972 => 608,  970 => 607,  967 => 606,  963 => 604,  955 => 600,  947 => 597,  937 => 593,  935 => 592,  919 => 587,  911 => 581,  909 => 580,  905 => 579,  896 => 573,  891 => 571,  888 => 570,  884 => 568,  880 => 566,  874 => 562,  870 => 560,  864 => 558,  862 => 557,  854 => 552,  848 => 548,  844 => 546,  838 => 544,  836 => 543,  830 => 539,  815 => 531,  812 => 530,  807 => 491,  800 => 523,  796 => 489,  790 => 519,  780 => 513,  774 => 509,  770 => 507,  764 => 505,  762 => 504,  754 => 499,  745 => 493,  742 => 492,  740 => 491,  732 => 487,  724 => 484,  718 => 482,  705 => 480,  702 => 472,  696 => 476,  686 => 468,  682 => 467,  678 => 468,  676 => 467,  671 => 465,  668 => 464,  664 => 463,  655 => 457,  646 => 451,  640 => 448,  636 => 446,  628 => 444,  603 => 439,  587 => 434,  574 => 431,  565 => 430,  563 => 429,  559 => 427,  553 => 425,  551 => 424,  542 => 421,  536 => 419,  534 => 418,  530 => 417,  527 => 408,  514 => 415,  297 => 200,  293 => 120,  280 => 194,  276 => 111,  271 => 190,  251 => 182,  249 => 92,  77 => 20,  174 => 74,  167 => 71,  118 => 49,  462 => 202,  449 => 198,  446 => 197,  422 => 184,  415 => 180,  408 => 176,  380 => 158,  361 => 152,  351 => 141,  348 => 140,  338 => 116,  335 => 134,  329 => 131,  325 => 129,  320 => 127,  315 => 131,  303 => 122,  289 => 196,  286 => 112,  267 => 101,  262 => 93,  256 => 96,  248 => 97,  233 => 87,  226 => 84,  216 => 79,  213 => 78,  200 => 72,  197 => 69,  185 => 75,  172 => 57,  165 => 83,  153 => 77,  150 => 55,  97 => 41,  127 => 35,  110 => 22,  90 => 42,  100 => 37,  58 => 25,  113 => 48,  1082 => 340,  1076 => 338,  1070 => 336,  1068 => 335,  1066 => 334,  1062 => 333,  1053 => 332,  1050 => 331,  1038 => 326,  1032 => 324,  1026 => 633,  1024 => 321,  1022 => 320,  1018 => 630,  1012 => 318,  1009 => 317,  997 => 622,  991 => 310,  985 => 308,  983 => 307,  981 => 306,  977 => 305,  973 => 304,  969 => 303,  965 => 302,  959 => 602,  956 => 300,  948 => 296,  944 => 295,  941 => 595,  932 => 287,  930 => 590,  926 => 589,  923 => 588,  918 => 280,  910 => 278,  906 => 277,  904 => 276,  902 => 275,  899 => 274,  893 => 572,  890 => 270,  886 => 267,  883 => 265,  881 => 264,  878 => 263,  871 => 259,  869 => 258,  845 => 257,  842 => 255,  839 => 253,  837 => 252,  835 => 251,  832 => 250,  828 => 538,  826 => 246,  824 => 537,  821 => 244,  817 => 239,  814 => 238,  810 => 492,  808 => 234,  806 => 233,  803 => 232,  799 => 229,  797 => 228,  795 => 227,  793 => 226,  791 => 225,  788 => 486,  784 => 221,  781 => 216,  776 => 212,  756 => 208,  753 => 206,  750 => 205,  747 => 203,  744 => 202,  741 => 200,  739 => 199,  737 => 490,  734 => 197,  730 => 192,  728 => 191,  725 => 190,  721 => 187,  719 => 186,  716 => 185,  706 => 473,  703 => 180,  701 => 179,  698 => 471,  694 => 470,  692 => 474,  689 => 173,  685 => 170,  683 => 169,  680 => 168,  675 => 165,  673 => 164,  670 => 163,  665 => 160,  663 => 159,  660 => 464,  656 => 155,  654 => 154,  651 => 153,  647 => 150,  645 => 149,  642 => 449,  638 => 145,  635 => 144,  631 => 141,  629 => 454,  626 => 443,  622 => 452,  619 => 135,  616 => 440,  611 => 129,  601 => 446,  596 => 127,  594 => 126,  591 => 436,  589 => 123,  586 => 122,  581 => 118,  579 => 116,  578 => 432,  577 => 114,  576 => 113,  572 => 112,  569 => 110,  567 => 414,  564 => 108,  558 => 104,  556 => 103,  554 => 102,  552 => 101,  550 => 100,  546 => 423,  543 => 97,  541 => 96,  538 => 95,  524 => 92,  521 => 91,  507 => 88,  504 => 87,  479 => 82,  476 => 80,  472 => 78,  467 => 77,  465 => 76,  448 => 75,  445 => 74,  441 => 196,  439 => 195,  431 => 189,  429 => 188,  425 => 63,  414 => 60,  412 => 59,  404 => 58,  401 => 172,  399 => 56,  397 => 55,  394 => 168,  389 => 160,  383 => 49,  377 => 129,  373 => 156,  370 => 45,  357 => 37,  349 => 34,  346 => 33,  342 => 137,  339 => 28,  334 => 141,  330 => 23,  328 => 139,  326 => 138,  323 => 128,  321 => 135,  317 => 17,  300 => 121,  295 => 11,  290 => 119,  287 => 5,  282 => 3,  275 => 105,  270 => 102,  265 => 105,  263 => 294,  260 => 293,  257 => 291,  255 => 101,  250 => 274,  245 => 270,  242 => 269,  237 => 91,  232 => 88,  222 => 83,  212 => 224,  207 => 76,  194 => 68,  191 => 67,  188 => 90,  186 => 72,  181 => 65,  178 => 59,  161 => 58,  146 => 147,  134 => 39,  129 => 122,  126 => 121,  124 => 108,  114 => 36,  104 => 31,  84 => 27,  81 => 23,  76 => 34,  70 => 15,  53 => 12,  480 => 162,  474 => 79,  469 => 158,  461 => 155,  457 => 153,  453 => 199,  444 => 149,  440 => 148,  437 => 69,  435 => 146,  430 => 144,  427 => 64,  423 => 62,  413 => 134,  409 => 132,  407 => 138,  402 => 130,  398 => 136,  393 => 126,  387 => 164,  384 => 132,  381 => 48,  379 => 119,  374 => 128,  368 => 126,  365 => 125,  362 => 124,  360 => 38,  355 => 150,  341 => 117,  337 => 27,  322 => 101,  314 => 16,  312 => 130,  309 => 129,  305 => 108,  298 => 120,  294 => 90,  285 => 100,  283 => 115,  278 => 106,  268 => 300,  264 => 84,  258 => 187,  252 => 283,  247 => 273,  241 => 93,  229 => 87,  220 => 81,  214 => 231,  177 => 69,  169 => 168,  140 => 55,  132 => 51,  128 => 42,  107 => 36,  61 => 12,  273 => 317,  269 => 107,  254 => 92,  243 => 88,  240 => 263,  238 => 85,  235 => 89,  230 => 244,  227 => 86,  224 => 241,  221 => 80,  219 => 237,  217 => 232,  208 => 76,  204 => 75,  179 => 69,  159 => 57,  143 => 56,  135 => 46,  119 => 40,  102 => 33,  71 => 23,  67 => 22,  63 => 21,  59 => 16,  38 => 18,  94 => 21,  89 => 30,  85 => 23,  75 => 24,  68 => 12,  56 => 11,  87 => 41,  21 => 2,  26 => 9,  93 => 27,  88 => 24,  78 => 18,  46 => 34,  27 => 7,  44 => 11,  31 => 4,  28 => 3,  201 => 74,  196 => 92,  183 => 71,  171 => 73,  166 => 54,  163 => 82,  158 => 80,  156 => 58,  151 => 152,  142 => 59,  138 => 47,  136 => 71,  121 => 50,  117 => 37,  105 => 25,  91 => 25,  62 => 27,  49 => 14,  24 => 4,  25 => 35,  19 => 1,  79 => 18,  72 => 17,  69 => 16,  47 => 21,  40 => 6,  37 => 7,  22 => 2,  246 => 136,  157 => 56,  145 => 74,  139 => 63,  131 => 61,  123 => 61,  120 => 31,  115 => 43,  111 => 47,  108 => 33,  101 => 30,  98 => 45,  96 => 30,  83 => 33,  74 => 27,  66 => 10,  55 => 38,  52 => 12,  50 => 18,  43 => 12,  41 => 19,  35 => 6,  32 => 4,  29 => 3,  209 => 223,  203 => 73,  199 => 93,  193 => 73,  189 => 66,  187 => 84,  182 => 87,  176 => 86,  173 => 85,  168 => 61,  164 => 70,  162 => 59,  154 => 153,  149 => 148,  147 => 75,  144 => 42,  141 => 73,  133 => 45,  130 => 46,  125 => 41,  122 => 43,  116 => 57,  112 => 43,  109 => 52,  106 => 51,  103 => 32,  99 => 23,  95 => 34,  92 => 28,  86 => 36,  82 => 19,  80 => 27,  73 => 33,  64 => 13,  60 => 22,  57 => 20,  54 => 19,  51 => 37,  48 => 16,  45 => 9,  42 => 11,  39 => 10,  36 => 10,  33 => 9,  30 => 5,);
    }
}
