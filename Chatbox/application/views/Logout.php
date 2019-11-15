<?php
if($this->session->userdata('status') == 'logged out')
{
    header('location:'.site_url("/Login"));
}