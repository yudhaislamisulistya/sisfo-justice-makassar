<?php

namespace HtmlToProseMirror\Test\Marks;

use HtmlToProseMirror\Renderer;
use HtmlToProseMirror\Test\TestCase;

class NestedMarksTest extends TestCase
{
    /** @test */
    public function nested_marks_get_rendered_correctly()
    {
        $html = '<strong>only bold <em>bold and italic</em> only bold</strong>';

        $json = [
            'type'    => 'doc',
            'content' => [
                [
                    'type'  => 'text',
                    'text'  => 'only bold ',
                    'marks' => [
                        [
                            'type' => 'bold',
                        ],
                    ],
                ],
                [
                    'type'  => 'text',
                    'text'  => 'bold and italic',
                    'marks' => [
                        [
                            'type' => 'bold',
                        ],
                        [
                            'type' => 'italic',
                        ],
                    ],
                ],
                [
                    'type'  => 'text',
                    'text'  => ' only bold',
                    'marks' => [
                        [
                            'type' => 'bold',
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->render($html));
    }
}
