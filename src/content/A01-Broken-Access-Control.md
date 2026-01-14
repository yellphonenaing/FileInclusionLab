# A01:2021 – Broken Access Control
Access control enforces policy such that users cannot act outside of their intended permissions. 

### Common Vulnerabilities
* Bypassing access control checks by modifying the URL (e.g., `post.php?name=../private/data.md`).
* Allowing primary key to be changed to another user's record (IDOR).

### Prevention
Deny by default. Implement access control mechanisms once and re-use them throughout the entire application.
