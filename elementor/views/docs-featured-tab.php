<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use DocfiTheme;
use DocfiTheme_Helper;
use \WP_Query;

$gap_class = '';
if ( $data['column_no_gutters'] == 'hide' ) {
   $gap_class  = 'no-gutters';
}
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']} "; ?>


<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>



<!-- start online-documentation section -->
<div class="best-online-documentation-section section-padding">
    <div class="row">
        <div class="col-lg-12 col-xl-4">
            <div class="isotope-menu2">
                <ul class="theme-logo-wrapper nav nav-tabs" id="myTab" role="tablist">
                    <li class="active" data-filter=".classima2">
                        <div class="logo-card logo-card--style-1 d-flex justify-content-between align-items-center wow animate__fadeInLeft animate__animated" data-wow-duration="1200ms" data-wow-delay="400ms">
                            <div class="logo">
                                <img src="images/best-online-doc/logo-1.svg" alt="">
                                <p class="text">Featured Products New</p>
                            </div>
                            <a href="" class="logo-card-btn">
                                <svg width="22" height="23" viewBox="0 0 22 23" fill="#D3D3D3" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 0.75C17.0586 0.75 22 5.69141 22 11.75C22 17.8516 17.0586 22.75 11 22.75C4.89844 22.75 0 17.8516 0 11.75C0 5.69141 4.89844 0.75 11 0.75ZM15.3828 12.7383C15.6406 12.4805 15.8125 12.1367 15.8125 11.75C15.8125 11.4062 15.6406 11.0625 15.3828 10.8047L10.5703 5.99219C10.0547 5.43359 9.15234 5.43359 8.63672 5.99219C8.07812 6.50781 8.07812 7.41016 8.63672 7.92578L12.4609 11.75L8.63672 15.6172C8.07812 16.1328 8.07812 17.0352 8.63672 17.5508C9.15234 18.1094 10.0547 18.1094 10.5703 17.5508L15.3828 12.7383Z" fill=""/>
                                </svg>
                            </a>
                        </div>
                    </li>
                    <li data-filter=".docfi2" class="">
                        <div class="logo-card logo-card--style-1 d-flex justify-content-between align-items-center wow animate__fadeInLeft animate__animated" data-wow-duration="1200ms" data-wow-delay="500ms">
                            <div class="logo">
                                <img src="images/best-online-doc/logo-2.svg" alt="">
                                <p class="text">Featured Products New</p>
                            </div>
                            <a href="" class="logo-card-btn">
                                <svg width="22" height="23" viewBox="0 0 22 23" fill="#D3D3D3" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 0.75C17.0586 0.75 22 5.69141 22 11.75C22 17.8516 17.0586 22.75 11 22.75C4.89844 22.75 0 17.8516 0 11.75C0 5.69141 4.89844 0.75 11 0.75ZM15.3828 12.7383C15.6406 12.4805 15.8125 12.1367 15.8125 11.75C15.8125 11.4062 15.6406 11.0625 15.3828 10.8047L10.5703 5.99219C10.0547 5.43359 9.15234 5.43359 8.63672 5.99219C8.07812 6.50781 8.07812 7.41016 8.63672 7.92578L12.4609 11.75L8.63672 15.6172C8.07812 16.1328 8.07812 17.0352 8.63672 17.5508C9.15234 18.1094 10.0547 18.1094 10.5703 17.5508L15.3828 12.7383Z" fill=""/>
                                </svg>
                            </a>
                        </div>
                    </li>
                    <li data-filter=".metro2" class="">
                        <div class="logo-card logo-card--style-1 d-flex justify-content-between align-items-center wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="600ms">
                            <div class="logo">
                                <img src="images/best-online-doc/logo-3.svg" alt="">
                                <p class="text">Featured Products New</p>
                            </div>
                            <a href="" class="logo-card-btn">
                                <svg width="22" height="23" viewBox="0 0 22 23" fill="#D3D3D3" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 0.75C17.0586 0.75 22 5.69141 22 11.75C22 17.8516 17.0586 22.75 11 22.75C4.89844 22.75 0 17.8516 0 11.75C0 5.69141 4.89844 0.75 11 0.75ZM15.3828 12.7383C15.6406 12.4805 15.8125 12.1367 15.8125 11.75C15.8125 11.4062 15.6406 11.0625 15.3828 10.8047L10.5703 5.99219C10.0547 5.43359 9.15234 5.43359 8.63672 5.99219C8.07812 6.50781 8.07812 7.41016 8.63672 7.92578L12.4609 11.75L8.63672 15.6172C8.07812 16.1328 8.07812 17.0352 8.63672 17.5508C9.15234 18.1094 10.0547 18.1094 10.5703 17.5508L15.3828 12.7383Z" fill=""/>
                                </svg>
                            </a>
                        </div>
                    </li>
                    <li data-filter=".digeco2" class="">
                        <div class="logo-card logo-card--style-1 d-flex justify-content-between align-items-center wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="700ms">
                            <div class="logo">
                                <img src="images/best-online-doc/logo-4.svg" alt="">
                                <p class="text">Featured Products New</p>
                            </div>
                            <a href="" class="logo-card-btn">
                                <svg width="22" height="23" viewBox="0 0 22 23" fill="#D3D3D3" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 0.75C17.0586 0.75 22 5.69141 22 11.75C22 17.8516 17.0586 22.75 11 22.75C4.89844 22.75 0 17.8516 0 11.75C0 5.69141 4.89844 0.75 11 0.75ZM15.3828 12.7383C15.6406 12.4805 15.8125 12.1367 15.8125 11.75C15.8125 11.4062 15.6406 11.0625 15.3828 10.8047L10.5703 5.99219C10.0547 5.43359 9.15234 5.43359 8.63672 5.99219C8.07812 6.50781 8.07812 7.41016 8.63672 7.92578L12.4609 11.75L8.63672 15.6172C8.07812 16.1328 8.07812 17.0352 8.63672 17.5508C9.15234 18.1094 10.0547 18.1094 10.5703 17.5508L15.3828 12.7383Z" fill=""/>
                                </svg>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- col end -->
        <div class="col-lg-12 col-xl-8 wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="400ms">
            <div class="best-documentation-info-wrapper">
                <div class="row isotope-items2">
                    <div class="col-xl-6 item classima2 metro2 child">
                        <div class="rt-card rt-card--style-3 rt-color-shade1-bg rt-border-radius-style-1">
                            <div class="icon d-flex justify-content-center align-items-center rt-color-shade4-bg rt-border-radius-style-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.66667 18.3333H13.3333C16.6833 18.3333 17.2833 16.9917 17.4583 15.3583L18.0833 8.69167C18.3083 6.65833 17.725 5 14.1667 5H5.83333C2.275 5 1.69166 6.65833 1.91666 8.69167L2.54166 15.3583C2.71666 16.9917 3.31666 18.3333 6.66667 18.3333Z" stroke="#F84436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6.66663 4.99984V4.33317C6.66663 2.85817 6.66663 1.6665 9.33329 1.6665H10.6666C13.3333 1.6665 13.3333 2.85817 13.3333 4.33317V4.99984" stroke="#F84436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.6667 10.8333V11.6667C11.6667 11.675 11.6667 11.675 11.6667 11.6833C11.6667 12.5917 11.6584 13.3333 10 13.3333C8.35004 13.3333 8.33337 12.6 8.33337 11.6917V10.8333C8.33337 10 8.33337 10 9.16671 10H10.8334C11.6667 10 11.6667 10 11.6667 10.8333Z" stroke="#F84436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M18.0416 9.1665C16.1166 10.5665 13.9166 11.3998 11.6666 11.6832" stroke="#F84436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2.18335 9.3916C4.05835 10.6749 6.17502 11.4499 8.33335 11.6916" stroke="#F84436" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <h3 class="card-title">
                                <a href="">Theme Elements</a>
                            </h3>
                            <p class="card-info">
                                Lorem ipsum dolor  consectetur adipiscing elit Mauri nullam the integer.
                            </p>
                        </div>
                    </div>
                    
                    <div class="col-xl-6 item classima2 digeco2 child">
                        <div class="rt-card rt-card--style-3 rt-color-shade1-bg rt-border-radius-style-1">
                            <div class="icon d-flex justify-content-center align-items-center rt-color-shade4-bg rt-border-radius-style-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.66669 1.66663V4.16663" stroke="#F47D0E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.3333 1.66663V4.16663" stroke="#F47D0E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17.5 7.08329V14.1666C17.5 16.6666 16.25 18.3333 13.3333 18.3333H6.66667C3.75 18.3333 2.5 16.6666 2.5 14.1666V7.08329C2.5 4.58329 3.75 2.91663 6.66667 2.91663H13.3333C16.25 2.91663 17.5 4.58329 17.5 7.08329Z" stroke="#F47D0E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6.66669 9.16663H13.3334" stroke="#F47D0E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6.66669 13.3334H10" stroke="#F47D0E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <h3 class="card-title">
                                <a href="">Content Use</a>
                            </h3>
                            <p class="card-info">
                                Lorem ipsum dolor  consectetur adipiscing elit Mauri nullam the integer.
                            </p>
                        </div>
                    </div>
                        
                    <div class="col-xl-6 item classima2 docfi2 child">
                        <div class=" rt-card rt-card--style-3 rt-color-shade1-bg rt-border-radius-style-1">
                            <div class="icon d-flex justify-content-center align-items-center rt-color-shade4-bg rt-border-radius-style-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4833 8.64998V11.3416C14.4833 13.5833 13.5833 14.4833 11.3417 14.4833H8.65C6.40833 14.4833 5.50833 13.5833 5.50833 11.3416V8.64998C5.50833 6.40832 6.40833 5.5083 8.65 5.5083H11.3417C13.5917 5.51663 14.4833 6.40832 14.4833 8.64998Z" stroke="#6836F8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M18.3333 4.80828V7.49996C18.3333 9.74163 17.4333 10.6416 15.1917 10.6416H14.4833V8.6583C14.4833 6.41664 13.5833 5.51662 11.3417 5.51662H9.35834V4.80828C9.35834 2.56662 10.2583 1.66663 12.5 1.66663H15.1917C17.4333 1.66663 18.3333 2.56662 18.3333 4.80828Z" stroke="#6836F8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1.66666 15.1917V12.5001C1.66666 10.2584 2.56666 9.3584 4.80832 9.3584H5.51666V11.3417C5.51666 13.5834 6.41666 14.4834 8.65832 14.4834H10.6417V15.1917C10.6417 17.4334 9.74166 18.3334 7.49999 18.3334H4.80832C2.56666 18.3334 1.66666 17.4334 1.66666 15.1917Z" stroke="#6836F8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <h3 class="card-title">
                                <a href="">Theme Elements</a>
                            </h3>
                            <p class="card-info">
                                Lorem ipsum dolor  consectetur adipiscing elit Mauri nullam the integer.
                            </p>
                        </div>
                    </div>
                        
                    <div class="col-xl-6 item classima2 metro2 child">
                        <div class="rt-card rt-card--style-3 rt-color-shade1-bg rt-border-radius-style-1">
                            <div class="icon d-flex justify-content-center align-items-center rt-color-shade4-bg rt-border-radius-style-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.8333 6.6665C17.214 6.6665 18.3333 5.54722 18.3333 4.1665C18.3333 2.78579 17.214 1.6665 15.8333 1.6665C14.4525 1.6665 13.3333 2.78579 13.3333 4.1665C13.3333 5.54722 14.4525 6.6665 15.8333 6.6665Z" stroke="#C82CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.83325 10.8335H9.99992" stroke="#C82CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.83325 14.1665H13.3333" stroke="#C82CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.6667 1.6665H7.50008C3.33341 1.6665 1.66675 3.33317 1.66675 7.49984V12.4998C1.66675 16.6665 3.33341 18.3332 7.50008 18.3332H12.5001C16.6667 18.3332 18.3334 16.6665 18.3334 12.4998V8.33317" stroke="#C82CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <h3 class="card-title">
                                <a href="">Theme Elements</a>
                            </h3>
                            <p class="card-info">
                                Lorem ipsum dolor  consectetur adipiscing elit Mauri nullam the integer.
                            </p>
                        </div>
                    </div>
                    
                    <div class="col-xl-6 item classima2 docfi2 child">
                        <div class="rt-card rt-card--style-3 rt-color-shade1-bg rt-border-radius-style-1">
                            <div class="icon d-flex justify-content-center align-items-center rt-color-shade4-bg rt-border-radius-style-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.08329 15.8085H6.66663C3.33329 15.8085 1.66663 14.9752 1.66663 10.8085V6.64185C1.66663 3.30851 3.33329 1.64185 6.66663 1.64185H13.3333C16.6666 1.64185 18.3333 3.30851 18.3333 6.64185V10.8085C18.3333 14.1418 16.6666 15.8085 13.3333 15.8085H12.9166C12.6583 15.8085 12.4083 15.9335 12.25 16.1419L11 17.8085C10.45 18.5419 9.54995 18.5419 8.99995 17.8085L7.74995 16.1419C7.61661 15.9585 7.31663 15.8085 7.08329 15.8085Z" stroke="#F47D0E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6.66667 7.24976L5 8.91642L6.66667 10.5831" stroke="#F47D0E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.3334 7.24976L15 8.91642L13.3334 10.5831" stroke="#F47D0E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10.8333 6.97498L9.16663 10.8583" stroke="#F47D0E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <h3 class="card-title">
                                <a href="">Theme Elements</a>
                            </h3>
                            <p class="card-info">
                                Lorem ipsum dolor  consectetur adipiscing elit Mauri nullam the integer.
                            </p>
                        </div>
                    </div>
                        
                    <div class="col-xl-6 item classima2 metro2 child">
                        <div class="rt-card rt-card--style-3 rt-color-shade1-bg rt-border-radius-style-1">
                            <div class="icon d-flex justify-content-center align-items-center rt-color-shade4-bg rt-border-radius-style-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.99999 6.57507L9.10832 8.12507C8.90832 8.46674 9.07499 8.75007 9.46666 8.75007H10.525C10.925 8.75007 11.0833 9.03341 10.8833 9.37507L9.99999 10.9251" stroke="#3678F8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6.91659 15.0335V14.0669C4.99993 12.9085 3.42493 10.6502 3.42493 8.25019C3.42493 4.12519 7.21659 0.891854 11.4999 1.82519C13.3833 2.24185 15.0333 3.49185 15.8916 5.21685C17.6333 8.71685 15.7999 12.4335 13.1083 14.0585V15.0252C13.1083 15.2669 13.1999 15.8252 12.3083 15.8252H7.71659C6.79993 15.8335 6.91659 15.4752 6.91659 15.0335Z" stroke="#3678F8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.08325 18.3333C8.99159 17.7916 11.0083 17.7916 12.9166 18.3333" stroke="#3678F8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <h3 class="card-title">
                                <a href="">Theme Elements</a>
                            </h3>
                            <p class="card-info">
                                Lorem ipsum dolor  consectetur adipiscing elit Mauri nullam the integer.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- col end -->
    </div>
    <!-- row end -->
</div>
<!-- end best online-documentation section -->