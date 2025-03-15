<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automated Library User Registration</title>
</head>
<body>
    <h1>Register for the Automated Library System</h1>
    <form action="action.php" method="post">
        <!-- Basic Information -->
        <fieldset>
            <legend>Basic Information</legend>
            <label for="fullName">Full Name:</label><br>
            <input type="text" id="fullName" name="fullName" required><br><br>

            <label for="email">Email Address:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="phone">Phone Number:</label><br>
            <input type="tel" id="phone" name="phone" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <label for="profilePhoto">Profile Photo (optional):</label><br>
            <input type="file" id="profilePhoto" name="profilePhoto"><br><br>
        </fieldset>

        <!-- User Type Dropdown -->
        <fieldset>
            <legend>User Type</legend>
            <label for="userType">Select your user type:</label><br>
            <select id="userType" name="userType" required>
                <option value="student">Student</option>
                <option value="faculty">Faculty</option>
                <option value="guest">Guest</option>
            </select><br><br>
        </fieldset>

        <!-- Membership Preferences Checklist -->
        <fieldset>
            <legend>Membership Preferences</legend>
            <label for="preferences">Select your preferences (multiple choices allowed):</label><br>
            <input type="checkbox" id="notifications" name="preferences[]" value="notifications">
            <label for="notifications">Email Notifications</label><br>
            <input type="checkbox" id="smsAlerts" name="preferences[]" value="smsAlerts">
            <label for="smsAlerts">SMS Alerts</label><br>
            <input type="checkbox" id="newsletter" name="preferences[]" value="newsletter">
            <label for="newsletter">Subscribe to Newsletter</label><br><br>
        </fieldset>

        <!-- Gender Radio Buttons -->
        <fieldset>
            <legend>Gender</legend>
            <label for="gender">Select your gender:</label><br>
            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label><br><br>
        </fieldset>

        <!-- Submit Button -->
        <input type="submit" value="Register">
    </form>
</body>
</html>