# A10:2021 – SSRF
SSRF flaws occur whenever a web application is fetching a remote resource without validating the user-supplied URL.

### Summary
It allows an attacker to coerce the application to send a crafted request to an unexpected destination.

### Prevention
Sanitize and validate all client-supplied input URLs against an allowlist.
