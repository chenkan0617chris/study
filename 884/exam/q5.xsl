<?xml version='1.0'?>
<xsl:stylesheet 
    version='1.0'
    xmlns:xsl='http://www.w3.org/1999/XSL/Transform'
    xmlns='http://www.w3.org/1999/xhtml'>
    <xsl:output method='xml' encoding='UTF-8'></xsl:output>
    <xsl:template match='/result'>
        <html>
            <head></head>
            <body style='padding: 12px;'>
                <b><xsl:text>Data Timestamp: </xsl:text></b>
                <xsl:value-of select='timestamp'></xsl:value-of><br />
                <b><xsl:text>Number of open projects: </xsl:text></b>
                <xsl:value-of select='projectsAmount'></xsl:value-of><br /><br />


                <ol style='padding-left: 12px;'>
                    <xsl:for-each select='projects/project'>
                        <li>
                            <b>
                                <xsl:text>Project reference number: </xsl:text>
                                <xsl:value-of select='@ref'></xsl:value-of>
                            </b>
                            
                        </li>
                        <ul style='padding: 0px;'>
                            <li style='list-style-type: disc;'>
                                <xsl:text>Application closing date: </xsl:text>
                                <xsl:value-of select='closingDate'></xsl:value-of>
                            </li>
                            <li style='list-style-type: disc;'>
                                <xsl:text>Application file format: </xsl:text>
                                <xsl:value-of select='format'></xsl:value-of>
                            </li>
                            <li style='list-style-type: disc;'>
                                <xsl:text>Floor Plan Diagram required: </xsl:text>
                                <xsl:value-of select='diagramRequired'></xsl:value-of>
                            </li>
                        </ul>
                        <br />
                     </xsl:for-each>
                </ol>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
