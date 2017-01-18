<?php

class test_target_shortname extends \tool_inspire\local\target\discrete {

    public function get_classes() {
        return array(1, 2, 3, 4);
    }

    protected function get_callback_classes() {
        return array(1, 2, 3);
    }

    public function get_analyser_class() {
        return '\tool_inspire\local\analyser\courses';
    }

    public function is_valid_analysable(\tool_inspire\analysable $analysable) {
        // This is testing, let's make things easy.
        return true;
    }

    protected function calculate_sample($sampleid, \tool_inspire\analysable $analysable, $data) {
        $sample = $data['course'][$sampleid];

        $firstchar = substr($sample->shortname, 0, 1);
        if ($firstchar === 'a') {
            return 1;
        } else if ($firstchar === 'b') {
            return 2;
        } else if ($firstchar === 'c') {
            return 3;
        } else {
            return 4;
        }
    }

    public function callback($sampleid, $prediction) {
        return 'yeah-' . $sampleid . '-' . $prediction;
    }
}