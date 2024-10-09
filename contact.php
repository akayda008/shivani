<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'portfolio_contacts');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the contact form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'])) {
        // Contact form data
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $occupation = $_POST['occupation'];
        $company = $_POST['company'];
        $productRequirement = $_POST['productRequirement'];

        // Insert the contact data into the contact_info table
        $sql_contact = "INSERT INTO contact_info (name, phone, email, occupation, company, product_requirement)
                        VALUES ('$name', '$phone', '$email', '$occupation', '$company', '$productRequirement')";

        if ($conn->query($sql_contact) === TRUE) {
            echo "Contact information saved successfully!";
        } else {
            echo "Error: " . $sql_contact . "<br>" . $conn->error;
        }
    }

    // Check if the review form was submitted
    if (isset($_POST['reviewName'])) {
        // Review form data
        $reviewName = $_POST['reviewName'];
        $username = $_POST['username'];
        $productReceived = $_POST['productReceived'];
        $review = $_POST['prodcutReview'];
        $rating = $_POST['rating'];

        // Insert the review data into the product_reviews table
        $sql_review = "INSERT INTO product_reviews (review_name, username, product_received, review, rating)
                       VALUES ('$reviewName', '$username', '$productReceived', '$review', '$rating')";

        if ($conn->query($sql_review) === TRUE) {
            echo "Review saved successfully!";
        } else {
            echo "Error: " . $sql_review . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="typography.css">
    <link rel="stylesheet" href="layout.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="contact.css"> <!-- Link to new CSS for contact page -->
</head>
<body>
    <header>
        <div id="logo">
            <a href="index.html">
                <img src="images/logo.png" width="40px" height="40px" alt="Logo">
            </a>
        </div>
        <div id="navigation">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="projects.html">Projects</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
        <div id="registration">
            <ul>
                <li><a href="registration.php">Sign up</a></li>
                <li><a href="login.php">Log in</a></li>
            </ul>
        </div>
    </header>
    
    <div id="contact-review">
        <div class="contact-container">
            <h2>Contact Us</h2>
            <form id="contactForm" action="contact.php" method="POST">
                <input type="text" id="name" name="name" placeholder="Your Name" required>
                <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="text" id="occupation" name="occupation" placeholder="Occupation/Job Title" required>
                <input type="text" id="company" name="company" placeholder="Company" required>
                <textarea id="productRequirement" name="productRequirement" placeholder="Product Requirement" rows="4" required></textarea>
                <button type="submit">Send</button>
            </form>
        </div>

        <div class="review-container">
            <h2>Leave a Review</h2>
            <form id="reviewForm" action="contact.php" method="POST">
                <input type="text" id="reviewName" name="reviewName" placeholder="Your Name" required>
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="text" id="productReceived" name="productReceived" placeholder="Product Received" required>
                <textarea id="prodcutReview" name="prodcutReview" placeholder="Review" rows="4" required></textarea>
                <input type="number" id="rating" name="rating" placeholder="Rating (out of 5)" min="1" max="5" required>
                <button type="submit">Submit Review</button>
            </form>
        </div>
    </div>
    <footer>
        <div id="links">
            <div id="phone">
                Phone: <a href="tel:+919032600370">+91 9032600370</a>
            </div>
            <div id="email">
                Email: <a href="mailto:gshivani00004@gmail.com">gshivani00004@gmail.com</a>
            </div>
            <div id="connect">
                <p>Connect with me:<br>
                    <span class="social">
                        <a href="https://linkedin.com">
                            <img src="images/linkedin.png" alt="linkedin" width="30px" height="30px">
                        </a>
                        <a href="https://instagram.com/g.shivani04">
                            <img src="images/insta.png" alt="instagram" width="30px" height="30px">
                        </a>
                        <a href="https://wa.me/+919032600370">
                            <img src="images/whatsapp.png" alt="whatsapp" width="30px" height="30px">
                        </a>
                    </span>
                </p>
            </div>
            <div id="contact">
                <p>
                    Leave a message here:<br>
                    <a href="contact.php">
                        <i style="font-size: large;">HERE</i>
                    </a>
                </p>
            </div>
        </div>
        <div id="copyright">
            &copy; G.Shivani
        </div>
    </footer>
</body>
</html>
