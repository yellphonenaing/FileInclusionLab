# A02:2021 – Cryptographic Failures
Focuses on failures related to cryptography which often leads to sensitive data exposure.

### Common Vulnerabilities
* Transmitting data in clear text (HTTP, FTP).
* Using old or weak cryptographic algorithms (MD5, SHA1).

### Prevention
Encrypt all sensitive data at rest and in transit (using TLS). Use strong, modern hashing functions like Argon2 or bcrypt.
