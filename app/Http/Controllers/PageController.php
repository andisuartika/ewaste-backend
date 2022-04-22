<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loadPage($layout = 'side-menu', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        return view('pages/' . $pageName, [
            'side_menu' => $this->sideMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'layout' => $layout
        ]);
    }

    /**
     * Determine active menu & submenu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activeMenu($layout, $pageName)
    {
        $firstPageName = '';
        $secondPageName = '';
        $thirdPageName = '';

        if ($layout == 'side-menu') {
            foreach ($this->sideMenu() as $menu) {
                if ($menu !== 'devider' && $menu['page_name'] == $pageName && empty($firstPageName)) {
                    $firstPageName = $menu['page_name'];
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenu) {
                        if ($subMenu['page_name'] == $pageName && empty($secondPageName) && $subMenu['page_name'] != 'dashboard') {
                            $firstPageName = $menu['page_name'];
                            $secondPageName = $subMenu['page_name'];
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubmenu) {
                                if ($lastSubmenu['page_name'] == $pageName) {
                                    $firstPageName = $menu['page_name'];
                                    $secondPageName = $subMenu['page_name'];
                                    $thirdPageName = $lastSubmenu['page_name'];
                                }       
                            }
                        }
                    }
                }
            }
        } 

        return [
            'first_page_name' => $firstPageName,
            'second_page_name' => $secondPageName,
            'third_page_name' => $thirdPageName
        ];
    }

    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sideMenu()
    {
        return [
            'dashboard' => [
                // 'fa-icon' => 'fas fa-home',
                'icon' => 'home',
                'layout' => 'side-menu',
                'page_name' => 'dashboard',
                'title' => 'Dashboard'
            ],
            'pengguna' => [
                // 'fa-icon' => 'fas fa-user-friends',
                'icon' => 'users',
                'page_name' => 'Pengguna',
                'title' => 'Pengguna',
                'sub_menu' => [
                    'nasabah' => [
                        // 'fa-icon' => 'fas fa-user',
                        'icon' => 'user',
                        'layout' => 'side-menu',
                        'page_name' => 'nasabah',
                        'title' => 'Nasabah'
                    ],
                    'petugas' => [
                        // 'fa-icon' => 'fas fa-user-cog',
                        'icon' => 'user-check',
                        'layout' => 'side-menu',
                        'page_name' => 'petugas',
                        'title' => 'Petugas'
                    ],
                    
                ]
            ],
            'sampah' => [
                // 'fa-icon' => 'fas fa-recycle',
                'icon' => 'trash-2',
                'layout' => 'side-menu',
                'page_name' => 'sampah',
                'title' => 'Sampah'
            ],
            'tugas-perjalanan' => [
                // 'fa-icon' => 'fas fa-recycle',
                'icon' => 'truck',
                'layout' => 'side-menu',
                'page_name' => 'tugas-perjalanan',
                'title' => 'Tugas Perjalanan'
            ],
            'validasi-tabungan' => [
                // 'fa-icon' => 'fas fa-recycle',
                'icon' => 'check-circle',
                'layout' => 'side-menu',
                'page_name' => 'validasi',
                'title' => 'Validasi Tabungan'
            ],
            'penarikan-saldo' => [
                'icon' => 'dollar-sign',
                'layout' => 'side-menu',
                'page_name' => 'penarikan',
                'title' => 'Penarikan Saldo'
            ],
            'grapik-laporan' => [
                'icon' => 'bar-chart-2',
                'layout' => 'side-menu',
                'page_name' => 'grapik-laporan',
                'title' => 'Grapik Laporan'
            ],
            'devider',
            'push-notification' => [
                'icon' => 'bell',
                'layout' => 'side-menu',
                'page_name' => 'broadcast-notification',
                'title' => 'Broadcast Notifikasi'
            ],
            'banner' => [
                'icon' => 'image',
                'layout' => 'side-menu',
                'page_name' => 'banner-event',
                'title' => 'Banner'
            ],
            'tentang-aplikasi' => [
                'icon' => 'settings',
                'page_name' => 'Tentang Aplikasi',
                'title' => 'Tentang Aplikasi',
                'sub_menu' => [
                    'tentang-aplikasi' => [
                        'icon' => 'info',
                        'layout' => 'side-menu',
                        'page_name' => 'tentang-aplikasi',
                        'title' => 'Tentang Aplikasi'
                    ],
                    'panduan-aplikasi' => [
                        'icon' => 'file-text',
                        'layout' => 'side-menu',
                        'page_name' => 'panduan-aplikasi',
                        'title' => 'Panduan Aplikasi'
                    ],
                    'syarat-ketentuan' => [
                        'icon' => 'alert-circle',
                        'layout' => 'side-menu',
                        'page_name' => 'syarat-ketentuan',
                        'title' => 'S&K Aplikasi'                   
                    ],
                    'kontak' => [
                        'icon' => 'link',
                        'layout' => 'side-menu',
                        'page_name' => 'sosmed-links',
                        'title' => 'Kontak'
                    ]
                ]
            ],
            
        ];
    }

}
