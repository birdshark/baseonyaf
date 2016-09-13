<?php

/**
 * Created by PhpStorm.
 * User: xiazh
 * Date: 9/12/2016
 * Time: 4:20 PM
 */
class AnalysisController extends BaseController
{
    public $title = "分析";

    public function init()
    {
        parent::init();
        $GLOBALS['XHPROF_LIB_ROOT'] = C('application.library') . '/Xhprof/Lib';
        require_once $GLOBALS['XHPROF_LIB_ROOT'] . '/display/xhprof.php';
    }

    public function indexAction()
    {

        $params = array('run' => array(XHPROF_STRING_PARAM, ''),
            'wts' => array(XHPROF_STRING_PARAM, ''),
            'symbol' => array(XHPROF_STRING_PARAM, ''),
            'sort' => array(XHPROF_STRING_PARAM, 'wt'), // wall time
            'run1' => array(XHPROF_STRING_PARAM, ''),
            'run2' => array(XHPROF_STRING_PARAM, ''),
            'source' => array(XHPROF_STRING_PARAM, 'xhprof'),
            'all' => array(XHPROF_UINT_PARAM, 0),
        );

        xhprof_param_init($params);
        global $run, $wts, $symbol, $sort, $run1, $run2, $source, $all, $source2, $sort_col;

        foreach ($params as $k => $v) {
            $params[$k] = $$k;
            if ($params[$k] == $v[1]) {
                unset($params[$k]);
            }
        }
        echo "<html>";
        echo "<head><title>XHProf: Hierarchical Profiler Report</title>";

        xhprof_include_js_css('/public/analysis');
        echo "</head>";
        echo "<body>";
        global $vbar, $vwbar, $vwlbar, $vbbar, $vrbar, $vgbar;
        $vbar = ' class="vbar"';
        $vwbar = ' class="vwbar"';
        $vwlbar = ' class="vwlbar"';
        $vbbar = ' class="vbbar"';
        $vrbar = ' class="vrbar"';
        $vgbar = ' class="vgbar"';
        $xhprof_runs_impl = new XHProfRuns_Default();
        displayXHProfReport($xhprof_runs_impl, $params, $source, $run, $wts,
            $symbol, $sort, $run1, $run2);
        echo "</body>";
        echo "</html>";
        return;
    }


    public function graphAction()
    {
        global $xhprof_legal_image_types, $threshold, $type,$func,$source,$critical,$run1,$run2,$run;
        ini_set('max_execution_time', 100);

        $params = array(// run id param
            'run' => array(XHPROF_STRING_PARAM, ''),

            // source/namespace/type of run
            'source' => array(XHPROF_STRING_PARAM, 'xhprof'),

            // the focus function, if it is set, only directly
            // parents/children functions of it will be shown.
            'func' => array(XHPROF_STRING_PARAM, ''),

            // image type, can be 'jpg', 'gif', 'ps', 'png'
            'type' => array(XHPROF_STRING_PARAM, 'png'),

            // only functions whose exclusive time over the total time
            // is larger than this threshold will be shown.
            // default is 0.01.
            'threshold' => array(XHPROF_FLOAT_PARAM, 0.01),

            // whether to show critical_path
            'critical' => array(XHPROF_BOOL_PARAM, true),

            // first run in diff mode.
            'run1' => array(XHPROF_STRING_PARAM, ''),

            // second run in diff mode.
            'run2' => array(XHPROF_STRING_PARAM, '')
        );
        xhprof_param_init($params);
        if ($threshold < 0 || $threshold > 1) {
            $threshold = $params['threshold'][1];
        }

        if (!array_key_exists($type, $xhprof_legal_image_types)) {
            $type = $params['type'][1];
        }

        $xhprof_runs_impl = new XHProfRuns_Default();

        if (!empty($run)) {
            xhprof_render_image($xhprof_runs_impl, $run, $type,
                $threshold, $func, $source, $critical);
        } else {
            xhprof_render_diff_image($xhprof_runs_impl, $run1, $run2,
                $type, $threshold, $source);
        }
    }

    public function typeaheadAction()
    {

        $xhprof_runs_impl = new XHProfRuns_Default();
        require_once $GLOBALS['XHPROF_LIB_ROOT'] . '/display/typeahead_common.php';
        return false;
    }

}