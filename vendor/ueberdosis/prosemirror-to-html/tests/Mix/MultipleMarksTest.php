<?php

namespace ProseMirrorToHtml\Test\Mix;

use ProseMirrorToHtml\Renderer;
use ProseMirrorToHtml\Test\TestCase;

class MultipleMarksTest extends TestCase
{
    /** @test */
    public function multiple_marks_get_rendered_correctly()
    {
        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Example Text',
                            'marks' => [
                                [
                                    'type' => 'bold',
                                ],
                                [
                                    'type' => 'italic',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $html = '<p><strong><em>Example Text</em></strong></p>';

        $this->assertEquals($html, (new Renderer)->render($json));
    }
}
