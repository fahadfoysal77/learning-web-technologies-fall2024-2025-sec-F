<head>
    
    <title>Job Publisher</title>
</head>
<body>
    <!-- Outer Border -->
    <table border="1" width="80%" cellpadding="10">
        <tr>
            <td>
                <!-- Header Section -->
                <table border="1" width="100%">
                    <tr>
                        <td colspan="2" align="left">
                            <strong>Job Publisher</strong>
                        </td>
                        <td align="right">
                            <strong>User</strong>
                        </td>
                    </tr>
                </table>

                <!-- Title -->
                <h2 align="center">Admit Card and Result</h2>

                <!-- Form Section -->
                <table border="1" align="center" cellpadding="10" width="50%">
                    <tr>
                        <td>
                            <form method="POST" action="upload.php" enctype="multipart/form-data">
                                <table align="center" cellpadding="10" width="100%">
                                    <tr>
                                        <td>Admit Card Upload:</td>
                                        <td><input type="file" name="admit_card" required></td>
                                    </tr>
                                    <tr>
                                        <td>Job Result Publish:</td>
                                        <td><input type="file" name="job_result" required></td>
                                    </tr>
                                    <tr>
                                        <td>Job Notice Publish:</td>
                                        <td><input type="file" name="job_notice" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                            <input type="submit" name="submit" value="Submit">
                                            <input type="reset" value="Reset">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
