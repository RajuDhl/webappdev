<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <body>
                <xsl:apply-templates select="//book[@type='fiction'][price &lt; 30]" />
                <xsl:variable name="totalCost" select="sum(//book[@type='fiction'][price &lt; 30]/price)"/>
                <p class="total-cost">Total: <xsl:value-of select="$totalCost" /></p>

            </body>
        </html>
    </xsl:template>
    <xsl:template match="book">
        <div class="book">
            <span class="title"><xsl:value-of select="title"/></span><br />
            <span class="author">
                <xsl:variable name="authorCount" select="count(authors/author)"/>
                <xsl:choose>
                    <xsl:when test="authors/author[position() &gt; 1]">
                        <xsl:value-of select="concat(authors/author[1], ' ')" /> et. el
                    </xsl:when>
                    <xsl:otherwise><xsl:value-of select="authors"/>

                    </xsl:otherwise>

                </xsl:choose>

            </span><br />
            <span class="price"><xsl:value-of select="format-number(price,'$###0.00')"/></span><br />
        </div>
    </xsl:template>


</xsl:stylesheet>
