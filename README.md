# Edge AnalyticsBundle

Symfony2 bundle providing Google like analytics measurement API via JavaScript.

**Features:**

- Async JS loading analytics script (Google-like)
- Collects data using form-like POST HTTP request with optional cache busting
- Collected values may be `ea('key','value')` and `ea('key': ['arr','ay'])`
- Customisable analytics.js URL and few other options

## Quick start

Place this code in HTML header:

    <script>
        (function(i,d,t,a,u,g,s){i['EdgeAnalyticsObject']=a;i[a]=i[a]||function(){
        (i[a].q=i[a].q||[]).push(arguments)};i[a].t=1*new Date();g=d.createElement(t);
        g.src=u;s=d.getElementsByTagName(t)[0];s.parentNode.insertBefore(g,s);
        }(window,document,'script','ea','/analytics/js'));

         // Custom collect route: string (defualt: '/analytics/collect')
         // Warning: URL parmeter 'z' is dedicated fot Cache Busting Token
        ea('_url','/analytics/collect?a=x');
         // Send Cache Busting Token: true|1|'on' (default: true)
        ea('_usecbt', 'on');
        // Collect response length: int (defualt: 35 = lenght of ea.gif)
        ea('_checksum','35');
        // Custom key: value paremeter
        ea('key', 'value');
        // Custom key: array paremeter
        ea('keyx', ['value1','value2','value3']);
    </script>

## Testing

### JavaScript Env.

Test folder contains mock server powered by node.js Express and index.html.
You will need node.js (`brew install node`) and its package manager NPM
(`curl http://npmjs.org/install.sh | sh`.

Steps:

- `cd` in to the `Tests`
- Run `npm install` (
- Run `npm start` or `node.js server.js`
- `open http://localhost:4000/`
- See index.html page network communication and source
