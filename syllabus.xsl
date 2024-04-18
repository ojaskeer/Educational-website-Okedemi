<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" encoding="UTF-8" indent="yes"/>

    <!-- Template for the root element -->
    <xsl:template match="/">
        <html lang="en">
            <head>
                <meta charset="UTF-8"/>
                <title>Syllabus</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
                <style>
                    body {
                        background: linear-gradient(to right, #4caf50, #10603b);
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        display: flex;
                        justify-content: space-around;
                        flex-wrap: wrap;
                    }
                    .frame-container {
                        width: calc(100% - 20px);
                        margin-bottom: 20px;
                        background-color: #f9f7e8;
                        border-radius: 10px;
                        padding: 20px;
                        box-sizing: border-box;
                    }
                    h2 {
                        color: #000;
                        text-align: center;
                    }
                    p {
                        color: #000;
                        margin: 0;
                    }
                    ul {
                        margin-top: 0;
                        padding-left: 20px;
                    }
                </style>
            </head>
            <body>
                <h1 style="text-align: center; color: #fff; padding-top: 20px; padding-bottom: 20px;">Syllabus</h1>
                <div class="container">
                    <xsl:apply-templates select="syllabus/course"/>
                </div>
            </body>
        </html>
    </xsl:template>

    <!-- Template for the course element -->
    <xsl:template match="course">
        <div class="frame-container" id="{@name}">
            <h2><xsl:value-of select="@name"/></h2>
            <xsl:apply-templates select="subject"/>
        </div>
    </xsl:template>

    <!-- Template for the subject element -->
    <xsl:template match="subject">
        <p><xsl:value-of select="@name"/>:</p>
        <ul>
            <xsl:apply-templates select="topic"/>
        </ul>
    </xsl:template>

    <!-- Template for the topic element -->
    <xsl:template match="topic">
        <li><xsl:value-of select="."/></li>
    </xsl:template>
</xsl:stylesheet>
