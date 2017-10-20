<?php
/**
 * Block to download the course pages
 *
 * @package    block_printcourse
 * @copyright  2017 Pukunui Technology
 * @author     Priya Ramakrishnan <priya@pukunui.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once("{$CFG->libdir}/completionlib.php");

/**
 * Course completion status.
 * Displays overall, and individual criteria status for logged in user.
 */
class block_mycertificates extends block_base {

    public function init() {
        $this->title = get_string('pluginname', 'block_mycertificates');
    }

    public function applicable_formats() {
        return array('all' => true);
    }

    public function get_content() {
        global $USER, $CFG;

        $rows = array();
        $srows = array();
        $prows = array();
        // If content is cached.
        if ($this->content !== null) {
            return $this->content;
        }

        $course = $this->page->course;
        $context = context_course::instance($course->id);

        // Create empty content.
        $this->content = new stdClass();
        $this->content->text = '';
        $this->content->footer = '';

        // Can edit settings?
        $can_edit = has_capability('moodle/course:update', $context);
        
       
        $this->content->text  = '<div class="printtranscript">';
        $this->content->text .= '<form ><fieldset class="invisiblefieldset">';
        $this->content->text .= '<p><a href="http://watercorpinduction.com.au/local/generatetranscript/index.php">';
        $this->content->text .= '<strong>'.get_string('printtranscript', 'block_mycertificates').'</strong></a></p><br>';
        $this->content->text .= '</fieldset></form></div>';
        return $this->content;
    }
}
