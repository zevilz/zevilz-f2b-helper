# Fail2ban helper for WordPress

The plugin pushes failed logins to webserver error log for Fail2Ban use.

## Installation

1. Put `zevilz-f2b-helper.php` in your mu-plugins directory (`wp-content/mu-plugins` by default).

2. Put `wp-login.conf` in Fail2Ban filters directory (`/etc/fail2ban/filter.d/`).

3. Add new filter in `/etc/fail2ban/jail.conf` or `/etc/fail2ban/jail.local` like below

```bash
[<filter_name>]
enabled  = true
port     = http,https
action   = %(banaction)s[name="<name_in_chain>", port="http,https", protocol="tcp", chain="%(chain)s", actname=%(banaction)s-tcp]
filter   = wp-login
logpath  = <log_path>
maxretry = <maxretry>
```

Example:

```bash
[wp-login]
enabled  = true
port     = http,https
action   = %(banaction)s[name="wordpress", port="http,https", protocol="tcp", chain="%(chain)s", actname=%(banaction)s-tcp]
filter   = wp-login
logpath  = /home/*/web/logs/nginx.*.error.log
maxretry = 3
```

4. Restart Fail2ban.
