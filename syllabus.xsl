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
                        padding: 50px;
                    }
                    .frame-container {
                        width: calc(100% - 100px);
                        margin: 0 auto;
                        background-color: #f9f7e8;
                        border-radius: 10px;
                        padding: 50px;
                        box-sizing: border-box;
                        margin: 20px;
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
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg" style="background-color: #f9f7e8;border-bottom: 2px solid #34693a;">
                    <div class="container-fluid">
                        <div class="icon">
                            <img src="images/okedemi_final_logo.jpeg" alt="logo" style="height: 50px; padding-right: 20px;"></img>
                        </div>
                        <div class="navbar-header">
                            <a class="navbar-brand" href="mp.php" style="font-family: anton-regular; font-size: xx-large; padding-bottom: 10px;"><b>OKADEMI</b></a>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-top: 15px;">
                                        <b>Study Materials</b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><hr class="dropdown-divider"></hr></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-top: 15px;">
                                        <b>Paid Courses</b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><hr class="dropdown-divider"></hr></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://www.facebook.com/"><img src="\images\Facebook_Logo_(2019).png.webp" style="height: 40px; padding-left: 55px;padding-bottom: 5px;"></img></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://www.youtube.com/"><img src="\images\ytlogo.png" style="height: 50px; padding-left: 20px;padding-bottom: 10px;"></img></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://www.instagram.com/?hl=en"><img src="images/instalogo.jpg" style="height: 40px; padding-left: 20px;padding-bottom: 5px;"></img></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="www.twitter.com/x"><img src="images/Xlogo.png" style="height: 40px; padding-left: 20px;padding-bottom: 5px;"></img></a>
                                </li>
                            </ul>
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"></input>
                                <button class="btn btn-outline-success" type="submit" style="border-width: 2px;"><b>Search</b></button>
                            </form>
                        </div>
                    </div>
                </nav>

                <!-- Main content -->
                <h1 style="text-align: center; color: #f9f7e8; padding-top:20px;">We are offering</h1>
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
