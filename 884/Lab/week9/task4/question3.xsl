<?xml version="1.0"?>
<xsl:stylesheet
 version="1.0"
 xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
 xmlns="http://www.w3.org/1999/xhtml">
    <xsl:output method='xml' indent='yes' encoding='UTF-8' />
    <xsl:template match='/audit'>
        <html>
            <head>
                <title>Enrolment</title>
                <style>
                    table {
                        border: 1px solid;
                        margin-top: 20px;
                    }

                    td {
                        border: 1px solid;
                    }

                    th {
                        border: 1px solid;
                    }
                </style>
            </head>
            <body>
                <h1>
                    <xsl:text>Enrolment statistics</xsl:text>
                </h1>
                <b>
                    <xsl:text>Campus: </xsl:text>
                </b>
                <xsl:value-of select='@campus' /><br />
                <b>
                    <xsl:text>Year: </xsl:text>
                </b>
                <xsl:value-of select='@year' /><br />
                <b>
                    <xsl:text>Session: </xsl:text>
                </b>
                <xsl:value-of select='@session' /><br />

                <table>
                    <tr>
                        <th>
                            <xsl:text>ID</xsl:text>
                        </th>
                        <th>
                            <xsl:text>Subject</xsl:text>
                        </th>
                        <th>
                            <xsl:text>Enrol</xsl:text>
                        </th>
                        <th>
                            <xsl:text>Withdrawn</xsl:text>
                        </th>
                    </tr>
                    <xsl:for-each select='subject'>
                        <tr>
                            <td>
                                <xsl:value-of select='@sid' />
                            </td>
                            <td>
                                <xsl:value-of select='code' />
                                <xsl:text>: </xsl:text>
                                <xsl:value-of select='title' />
                            </td>
                            <td>
                                <xsl:value-of select='statistics/enrol' />
                            </td>
                            <td>
                                <xsl:value-of select='statistics/withdrawn' />
                            </td>
                        </tr>
                    </xsl:for-each>
                    
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>