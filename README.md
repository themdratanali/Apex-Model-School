<h2>Project Overview</h2>
<p>The Apex Model School website is designed to provide information about the school, including its curriculum, faculty, admission process, and more. The website offers a user-friendly experience for students, parents, and staff.</p>

<h2>Features</h2>
<ul>
    <li><strong>Home Page:</strong> Overview of the school, mission, and vision.</li>
    <li><strong>Admission Info:</strong> Details about the admission process and requirements.</li>
    <li><strong>Academic Programs:</strong> Information about the courses offered.</li>
    <li><strong>Gallery:</strong> View photos of school events and facilities.</li>
    <li><strong>Contact Us:</strong> Get in touch with school administration.</li>
    <li><strong>Admin Panel:</strong> Manage content and update website information.</li>
</ul>

<h2>Technologies Used</h2>
<ul>
    <li><strong>Frontend:</strong> HTML, CSS, JavaScript</li>
    <li><strong>Backend:</strong> PHP (Core PHP)</li>
    <li><strong>Database:</strong> MySQL (phpMyAdmin via XAMPP)</li>
    <li><strong>Version Control:</strong> GitHub</li>
</ul>

<h2>Installation Instructions</h2>
<h3>Prerequisites</h3>
<ul>
    <li>XAMPP (for Apache and MySQL)</li>
    <li>PHP (at least version 7.4)</li>
    <li>Git (for cloning the repository)</li>
</ul>

<h3>Steps to Install</h3>
<ol>
    <li>Clone the repository from GitHub:</li>
    <pre><code>git clone https://github.com/yourusername/apex-model-school.git</code></pre>
    <li>Move the project folder to your XAMPP <code>htdocs</code> directory.</li>
    <li>Start the Apache and MySQL services using XAMPP Control Panel.</li>
    <li>Import the database:</li>
    <ul>
        <li>Open phpMyAdmin and create a new database named <code>apex_school</code>.</li>
        <li>Import the <code>apex_school.sql</code> file provided in the database folder.</li>
    </ul>
    <li>Update database connection details in <code>config/connection.php</code>:</li>
    <pre><code>$host = 'localhost';</code></pre></ol>

    <h2>Usage Instructions</h2>
<ul>
    <li><strong>Navigate Pages:</strong> Browse school details and resources.</li>
    <li><strong>Admission Process:</strong> Submit applications online.</li>
    <li><strong>Admin Login:</strong> Manage school content (Default credentials: admin/Password).</li>
</ul>

<h2>Contribution</h2>
<p>Feel free to contribute to the project by submitting pull requests on GitHub.</p>

<h2>License</h2>
<p>This project is licensed under the MIT License.</p>

<h2>Contact</h2>
<p>For any inquiries, please contact <a href="mailto:themdratanali@gmail.com">themdratanali@gmail.com</a>.</p>
