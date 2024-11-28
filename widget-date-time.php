<?php

class Elementor_Date_Time_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'date_time_widget';
    }

    public function get_title() {
        return 'Date & Time Widget';
    }

    public function get_icon() {
        return 'eicon-clock';
    }

    public function get_categories() {
        return [ 'general' ]; // Or any other category
    }

    protected function _register_controls() {
        // Add the option to change the date/time format
        $this->start_controls_section(
            'section_settings',
            [
                'label' => __( 'Settings', 'elementor' ),
            ]
        );

        $this->add_control(
            'date_format',
            [
                'label'   => __( 'Date Format', 'elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'l, F j, Y', // Default format: e.g., "Monday, March 8, 2024"
            ]
        );

        $this->add_control(
            'time_format',
            [
                'label'   => __( 'Time Format', 'elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'H:i:s', // Default time format: e.g., "14:25:12"
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        // Get the settings
        $settings = $this->get_settings_for_display();
        $date_format = $settings['date_format'];
        $time_format = $settings['time_format'];

        // Output HTML
        echo '<div id="date-time-widget" class="date-time-widget">';
        echo '<div id="current-date" class="current-date">' . date( $date_format ) . '</div>';
        echo '<div id="current-time" class="current-time">' . date( $time_format ) . '</div>';
        echo '</div>';
    }

    protected function _content_template() {
        ?>
        <#
        var date = new Date();
        var dateFormat = settings.date_format;
        var timeFormat = settings.time_format;
        var formattedDate = moment(date).format(dateFormat);
        var formattedTime = moment(date).format(timeFormat);
        #>
        <div id="date-time-widget" class="date-time-widget">
            <div id="current-date" class="current-date">{{{ formattedDate }}}</div>
            <div id="current-time" class="current-time">{{{ formattedTime }}}</div>
        </div>
        <?php
    }
}
