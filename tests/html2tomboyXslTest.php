<?php
class html2tomboyXslTest extends PHPUnit_Framework_TestCase
{
    /**
     * Use xsltproc and diff to check if the XSL file generates
     * the same output as we expect.
     */
    public function testFormat()
    {
        exec(
            'xsltproc'
            . ' ../templates/html2tomboy.xsl'
            . ' data/full-formattest.html'
            . ' | diff -u data/formattest.tomboynotecontent -',
            $out,
            $retval
        );
        $this->assertEquals(
            0, $retval,
            "diff exit status is not 0:\n" . implode("\n", $out)
        );
    }
}
?>