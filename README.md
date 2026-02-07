# Time Capsule

A web-based time capsule where users can write a message for themselves or others to be delivered on a future date.

## Key Features

### Capsule Creation
- Logged-in users can create capsules.
- Set an open date and upload optional files (PDF, image, etc.).

### Capsule Listing
- **Future Capsules:** Only listed to the owner before the open date.
- **Opened Capsules:** Publicly visible if the open date has passed.

### User Authentication
- Login/Registration system with password hashing.
- Session-based access control.

### Email Notifications
- Email notifications when capsule opens (via PHPMailer).

### Comment System
- Visitors can leave site-wide comments.

### Theme Toggle
- Light/Dark mode with localStorage persistence.

### Admin-Free Automation
- `notify_capsules.php` file runs via cronjob or manual trigger to send capsule emails.

---

## !!! Disclaimer

**This project is created for educational and learning purposes only.** It is not intended for use in a production environment. Please do not use this in real-world applications requiring security or reliability.
