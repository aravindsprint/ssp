<?php
class php_email_form {
    public $to = '';
    public $from_name = '';
    public $from_email = '';
    public $subject = '';
    public $messages = array();
    public $ajax = false;

    public function add_message($content, $name = '', $priority = 0) {
        $this->messages[] = array('content' => $content, 'name' => $name, 'priority' => $priority);
    }

    public function send() {
        $email_text = '';
        
        foreach ($this->messages as $message) {
            $email_text .= $message['name'] . ": " . $message['content'] . "\n";
        }

        $headers = 'From: ' . $this->from_name . ' <' . $this->from_email . '>' . "\r\n";
        
        if(mail($this->to, $this->subject, $email_text, $headers)) {
            return true;
        } else {
            return false;
        }
    }
}
?>
