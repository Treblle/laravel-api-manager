# Laravel API Manager


```yaml
integrations:
  github:
    url: 'https://api.github.com/'
    auth:
      type: Bearer
      value: !env 'GITHUB_TOKEN'
      name: 'Authorization'

  treblle:
    url: 'https://api.treblle.com'
    auth:
      type: Header
      token: !env 'TREBLLE_TOKEN'
      name: 'X-API-KEY'
```

```php
use Treblle\ApiManager\Facades\Integration;

Integration::for('github')->get('something')->json();
```

```php
Http::baseUrl('https://api.github.com')->withToken(
    token: '1234-1234-1234',
)->get('something')->json();
```
