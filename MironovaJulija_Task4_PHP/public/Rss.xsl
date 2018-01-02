<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" 
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <style>
                    #news {
                        font-family: Arial, Helvetica, sans-serif;
                        border-collapse: collapse;
                    }
                    #news td, #news th {
                        border: 1px solid #ddd;
                        padding: 8px;
                    }                                                                              
                    #news tr:hover {background-color: #FFE4C4;}
                    #news th {
                        text-align: left;
                        background-color: #FFA500;
                        color: white;
                    }
                    #news a:link {
                        color: #000000;
                    }
                    #news a:visited {
                        color: #FFA500;
                    }
                    #news a:hover {
                        color: #000000;
                    }                                                              
                </style>
            </head>
            <body>
                <h2 align="center">News</h2>
                <table id="news">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Publication date</th>
                    </tr>
                    <xsl:for-each select="catalog/article">
                        <xsl:sort select="pubDate" order = "descending"/>
                        <tr>
                            <xsl:if test="position() mod 2 = 0">
                                <xsl:attribute name="bgcolor">#f7f7f7</xsl:attribute>
                            </xsl:if>
                            <td style="width: 300px">
                                <a href="{link}" target="blank"><xsl:value-of select="title"/></a>
                            </td>
                            <td style="font-size: 0.85em;">
                                <xsl:value-of select="description"/>
                            </td>
                            <td>
                                <xsl:value-of select="pubDate"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet> 