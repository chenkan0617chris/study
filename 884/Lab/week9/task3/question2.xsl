<?xml version="1.0"?>
<xsl:stylesheet
 version="1.0"
 xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
 xmlns="http://www.w3.org/1999/xhtml">
    <xsl:output method='xml' indent='yes' encoding='UTF-8' />
    <xsl:template match='/result'>
        <html>
            <head>
                <title>result</title>
                <style>
                    td {
                        padding: 8px;
                        border: 1px dashed;
                    }
                    table tr td:first-child {
                        color: #808080
                    }

                    table tr td:last-child {
                        color: #800100
                    } 
                </style>
            </head>
            <body>
                <h1>
                    <xsl:text>Exam result</xsl:text>
                </h1>
                <table border="1px solid" padding='8px'>
                    <tr>
                        <td align='right' >
                            <xsl:text>Reference number</xsl:text>
                        </td>
                        <td>
                            <xsl:value-of select='@ref' />
                        </td>
                    </tr>
                    <tr>
                        <td align='right'>
                            <xsl:text>Exam number</xsl:text>
                        </td>
                        <td>
                            <xsl:value-of select='examId' />
                        </td>
                    </tr>
                    <tr>
                        <td align='right'>
                            <xsl:text>Contestant number</xsl:text>
                        </td>
                        <td>
                            <xsl:value-of select='contestantId' />
                        </td>
                    </tr>
                    <tr>
                        <td align='right'>
                            <xsl:text>Digital signature</xsl:text>
                        </td>
                        <td>
                            <xsl:value-of select='digitalSignature' />
                        </td>
                    </tr>
                    <tr>
                        <td align='right'>
                            <xsl:text>Score</xsl:text>
                        </td>
                        <td>
                            <xsl:value-of select='score' />
                        </td>
                    </tr>
                    <tr>
                        <td align='right'>
                            <xsl:text>Band</xsl:text>
                        </td>
                        <td>
                            <xsl:value-of select='band' />
                        </td>
                    </tr>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>