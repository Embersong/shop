    <?php

class ContactsController extends Controller
{

    function __construct()
    {
        parent::__construct();
		    $this->view = 'contacts';
        $this->title .= ' | Контакты';
    }


}