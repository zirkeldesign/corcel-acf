<?php

use Corcel\Acf\Field\Basic\Email;
use Corcel\Acf\Field\Basic\Number;
use Corcel\Acf\Field\Basic\Password;
use Corcel\Acf\Field\Basic\Text;
use Corcel\Acf\Field\Basic\Textarea;
use Corcel\Acf\Field\Basic\Url;
use Corcel\Post;

/**
 * Class BasicFieldTest
 *
 * @author Junior Grossi <juniorgro@gmail.com>
 */
class BasicFieldTest extends PHPUnit_Framework_TestCase 
{
    /**
     * @var Post
     */
    protected $post;

    /**
     * Setup a base $this->post object to represent the page with the basic fields
     */
    protected function setUp()
    {
        $this->post = Post::find(11); // it' a page with the custom fields
    }

    public function testTextFieldValue()
    {
        $text = new Text($this->post, 'fake_text');
        $this->assertEquals('Proin eget tortor risus', $text->get());
    }

    public function testTextareaFieldValue()
    {
        $textarea = new Textarea($this->post, 'fake_textarea');
        $this->assertEquals('Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.', $textarea->get());
    }

    public function testNumberFieldValue()
    {
        $number = new Number($this->post, 'fake_number');
        $this->assertEquals('1984', $number->get());
    }

    public function testEmailFieldValue()
    {
        $email = new Email($this->post, 'fake_email');
        $this->assertEquals('junior@corcel.org', $email->get());
    }

    public function testUrlFieldValue()
    {
        $url = new Url($this->post, 'fake_url');
        $this->assertEquals('https://corcel.org', $url->get());

    }

    public function testPasswordFieldValue()
    {
        $password = new Password($this->post, 'fake_password');
        $this->assertEquals('123change', $password->get());
    }
}
