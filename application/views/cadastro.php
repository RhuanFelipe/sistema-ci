<?php

echo form_open_multipart('cadastro/register');

echo form_upload('userfile');

echo form_submit(array('name' => 'ok', 'value' => 'cadastrar', 'class' => 'btn btn-primary'));

echo form_close();

