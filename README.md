# Open eClass 2.3: Security Audit & Penetration Testing

This project was developed for the **Computer Systems Security** course at the **National and Kapodistrian University of Athens (UoA)**. It involves two phases: securing a vulnerable version of the Open eClass platform and performing targeted attacks on external environments.



---

## 🛡️ Defensive Implementation

To secure the version of Open eClass, we implemented professional-grade countermeasures against common web attack vectors.

### 1. CSRF Protection (Cross-Site Request Forgery)
We implemented a custom **Synchronizer Token Pattern**. Every state-changing CRUD action now requires a cryptographically secure, session-linked token.
* **Mechanism:** Tokens are generated per-session, embedded in forms, and validated server-side.
* **Regeneration:** Tokens are refreshed after every check to prevent replay attacks.

### 2. SQL Injection Mitigation
Switched from raw queries to **MySQLi Prepared Statements**. 
* **Logic:** By using `mysqli_stmt_prepare` and `mysqli_stmt_bind_param`, we ensured that user input is treated strictly as data, never as executable code.
* **Coverage:** Applied to all modules involving data creation, editing, or deletion.



### 3. XSS & RFI Defenses
* **Input Sanitization:** Global use of `htmlspecialchars()` to neutralize malicious HTML/Script tags.
* **Remote File Inclusion (RFI):** * Implemented **Randomized Filename Prefixes** using `openssl_random_pseudo_bytes` to prevent predictable file paths.
    * Hardened file permissions to **Write-Only (0222)** for uploaded assets to prevent execution.

---

## ⚔️ Offensive Security (The Attack Phase)

We successfully compromised a target environment by chaining multiple vulnerabilities.

### 1. SQL Injection (Privilege Escalation)
By exploiting an unescaped `topic_id` parameter in the discussion module (`reply.php`), we successfully bypassed local authentication. This allowed us to access the database upgrade utility and gain initial instructor-level privileges.

### 2. XSS & Cookie Stealing
We executed a **Stored XSS** attack by injecting a malicious script into a discussion topic. 
* **Payload:** A script that redirects the victim's session cookie (`PHPSESSID`) to our external "Cookie Stealer" server.
* **Result:** Successfully hijacked the `drunkadmin` session, granting us full platform administrative access.



### 3. Full System Defacement
With Admin access, we bypassed client-side file-type filters to upload a PHP shell.
* **Database Manipulation:** Accessed the database via the admin panel to inject redirect scripts into course descriptions and announcements.
* **The Redirect:** All visitors to the homepage were automatically redirected to our "Defaced" site, demonstrating full control over the platform's content.

---

## Technical Environment
* **Platform:** Open eClass 2.3 (PHP/MySQL)
* **Virtualization:** Docker-Compose for reproducible vulnerable environments.
* **Tools:** Burp Suite (Analysis), Custom PHP Cookie Stealers, MySQLi Stmt Library.

---

## Getting Started

### Deployment via Docker
```bash
# Build and start the environment
docker-compose up -d
```
Access the site at http://localhost:8001/ and follow the custom installation guide in the source code.
