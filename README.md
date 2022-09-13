
# Newshub Hyperlocal

## Helper

```php
dd(\Data::headline());
```
```php
dd(\Data::headline());
```
```php
dd(\Data::latest());
```
```php
dd(collect(\Data::trendingTag())->slice(0, 4));
```
```php
dd(\Data::listTag());
```
```php
dd(\Data::detailTag(28305));
```
```php
dd(\Data::listCategory());
```
```php
dd(\Data::listNewsByTag('penelitian-ilmiah'));
```
```php
dd(\Data::listNewsByCategory(79));
```
```php
dd(\Data::detailNews(105618));
```
```php
dd(\Src::img('http://cdn-dev.newshub.id/klimg/news/2018/02/06/105618/testing-post-180206w.jpg', '85x85', 'jpeg'));
```
```php
for( $i=1;$i<=12;$i++ ) echo \Util::date(date("Y-M-d H:i:s", strtotime(date("2022-".$i."-01 H:i:s"))), 'short_time').'<br/>';
```
```php
$row = (\Data::detailNews(164519));
dd($row);
dd(\Src::imgNewsCdn($row, '85x85', 'jpeg'));
```
```php
dd(\Src::detail($row));
```
```php
dd(\Data::recommendation($row));
```
```php
dd(\Util::date("2022-03-26 11:00:00", 'ago')); //time ago
```