# indikator-kemiskinan-kabupaten-kota
Indikator Kemiskinan Menurut Kabupaten/Kota Se-Provinsi Banten

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/indikator-kemiskinan-kabupaten-kota:dev-master
```
- Latest release:

## download via github

~~~bash
$ git clone https://github.com/bantenprov/indikator-kemiskinan-kabupaten-kota.git
~~~

#### Edit `config/app.php` :

```php
'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\IKKabupatenKota\IKKabupatenKotaServiceProvider::class,
```

#### Lakukan migrate :

```bash
$ php artisan migrate
```

#### Publish database seeder :

```bash
$ php artisan vendor:publish --tag=ik-kabupaten-kota-seeds

```

#### Lakukan auto dump :

```bash
$ composer dump-autoload
```

#### Lakukan seeding :

```bash
$ php artisan db:seed --class=BantenprovIKKabupatenKotaSeeder
```

#### Lakukan publish component vue :

```bash
$ php artisan vendor:publish --tag=ik-kabupaten-kota-assets
$ php artisan vendor:publish --tag=ik-kabupaten-kota-public
```
#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript
{
    path: '/dashboard',
    redirect: '/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
        path: '/dashboard/ik-kabupaten-kota',
        components: {
            main: resolve => require(['./components/views/bantenprov/ik-kabupaten-kota/DashboardIKKabupatenKota.vue'], resolve),
            navbar: resolve => require(['./components/Navbar.vue'], resolve),
            sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
        },
        meta: {
            title: "Indikator Kemiskinan Kabupaten-Kota"
        }
      }
        //== ...
    ]
},
```

```javascript
{
    path: '/admin',
    redirect: '/admin/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
            path: '/admin/ik-kabupaten-kota',
            components: {
                main: resolve => require(['./components/bantenprov/ik-kabupaten-kota/IKKabupatenKota.index.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Indikator Kemiskinan Kabupaten-Kota"
            }
        },
        {
            path: '/admin/ik-kabupaten-kota/create',
            components: {
                main: resolve => require(['./components/bantenprov/ik-kabupaten-kota/IKKabupatenKota.add.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Indikator Kemiskinan Kabupaten-Kota"
            }
        },
        {
            path: '/admin/ik-kabupaten-kota/:id',
            components: {
                main: resolve => require(['./components/bantenprov/ik-kabupaten-kota/IKKabupatenKota.show.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Indikator Kemiskinan Kabupaten-Kota"
            }
        },
        {
            path: '/admin/ik-kabupaten-kota/:id/edit',
            components: {
                main: resolve => require(['./components/bantenprov/ik-kabupaten-kota/IKKabupatenKota.edit.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Indikator Kemiskinan Kabupaten-Kota"
            }
        }, 
        //== ...
    ]
},
```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
    name: 'Dashboard',
    icon: 'fa fa-dashboard',
    childType: 'collapse',
    childItem: [
        //== ...
        {
          name: 'Indikator Kemiskinan Kabupaten-Kota',
          link: '/dashboard/ik-kabupaten-kota',
          icon: 'fa fa-angle-double-right'
      	}
        //== ...
    ]
},
```

```javascript
{
    name: 'Admin',
    icon: 'fa fa-lock',
    childType: 'collapse',
    childItem: [
        //== ...
        {
            name: 'Indikator Kemiskinan Kabupaten-Kota',
            link: '/admin/ik-kabupaten-kota',
            icon: 'fa fa-angle-double-right'
          }
        //== ...
    ]
},
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

// Indikator Kemiskinan Kabupaten-Kota

import IKKabupatenKota from './components/bantenprov/ik-kabupaten-kota/IKKabupatenKota.chart.vue';
Vue.component('echarts-ik-kabupaten-kota', IKKabupatenKota);

import IKKabupatenKotaKota from './components/bantenprov/ik-kabupaten-kota/IKKabupatenKotaKota.chart.vue';
Vue.component('echarts-ik-kabupaten-kota-kota', IKKabupatenKotaKota);

import IKKabupatenKotaTahun from './components/bantenprov/ik-kabupaten-kota/IKKabupatenKota.chart.vue';
Vue.component('echarts-ik-kabupaten-kota-tahun', IKKabupatenKotaTahun);

import IKKabupatenKotaAdminShow from './components/bantenprov/ik-kabupaten-kota/IKKabupatenKotaAdmin.show.vue';
Vue.component('admin-view-ik-kabupaten-kota-tahun', IKKabupatenKotaAdminShow);

//== Echarts Indikator Kemiskinan Kabuapaten-Kota

import IKKabupatenKotaBar01 from './components/views/bantenprov/ik-kabupaten-kota/IKKabupatenKotaBar01.vue';
Vue.component('ik-kabupaten-kota-bar-01', IKKabupatenKotaBar01);

import IKKabupatenKotaBar02 from './components/views/bantenprov/ik-kabupaten-kota/IKKabupatenKotaBar02.vue';
Vue.component('ik-kabupaten-kota-bar-02', IKKabupatenKotaBar02);

//== mini bar charts
import IKKabupatenKotaBar03 from './components/views/bantenprov/ik-kabupaten-kota/IKKabupatenKotaBar03.vue';
Vue.component('ik-kabupaten-kota-bar-03', IKKabupatenKotaBar03);

import IKKabupatenKotaPie01 from './components/views/bantenprov/ik-kabupaten-kota/IKKabupatenKotaPie01.vue';
Vue.component('ik-kabupaten-kota-pie-01', IKKabupatenKotaPie01);

import IKKabupatenKotaPie02 from './components/views/bantenprov/ik-kabupaten-kota/IKKabupatenKotaPie02.vue';
Vue.component('ik-kabupaten-kota-pie-02', IKKabupatenKotaPie02);

//== mini pie charts
import IKKabupatenKotaPie03 from './components/views/bantenprov/ik-kabupaten-kota/IKKabupatenKotaPie03.vue';
Vue.component('ik-kabupaten-kota-pie-03', IKKabupatenKotaPie03);

