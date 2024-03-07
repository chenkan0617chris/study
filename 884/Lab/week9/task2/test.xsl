<?xml version='1.0'?>
<xsl:stylesheet
 version="1.0"
 xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
 xmlns="http://www.w3.org/1999/xhtml">
    <xsl:output></xsl:output>
    <xsl:template match='/result'>
        <html>
            <head></head>
            <body>
                <h1>
                    <xsl:text>Exam result</xsl:text>
                </h1>
                <br/>
                <xsl:text>reference Number:</xsl:text>
                <xsl:value-of select='@ref'></xsl:value-of><br/>
                <xsl:text>Exam number: </xsl:text>
                <xsl:value-of select='examId'></xsl:value-of>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>