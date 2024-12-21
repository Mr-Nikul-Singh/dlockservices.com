<?php
function client_validation(){
    $error = array(
        array(
            'field'  => 'name',
            'label'  => 'name',
            'rules'  => 'trim|required',
            'errors' => array(
                'required'   => 'please enter client %s',
                )
        ),
        array(
            'field'  => 'contact',
            'label'  => 'contact number',
            'rules'  => 'trim|required|numeric',
            'errors' => array(
                'required'   => 'please enter client %s',
                'is_numeric' => 'please enter 10 digit number',
                'exact_length' => 'please enter 10 digit number'
                )
        ),
        // array(
        //     'field'  => 'email',
        //     'label'  => 'email',
        //     'rules'  => 'trim|required|valid_email',
        //     'errors' => array(
        //         'required'   => 'please enter client %s',
        //         'valid_email' => 'please enter valid email address',
        //         )
        // ),
        array(
            'field'  => 'pan',
            'label'  => 'PAN card number',
            'rules'  => 'trim|exact_length[10]|alpha_numeric',
            'errors' => array(
                'required'   => 'please enter client %s',
                'is_numeric' => 'please enter 10 digit number',
                'exact_length' => 'please enter 10 digit number'
                )
        ),
        array(
            'field'  => 'dob',
            'label'  => 'date of birth',
            'rules'  => 'trim',
            'errors' => array(
                'required'   => 'please enter %s',
                )
        ),
        array(
            'field'  => 'address',
            'label'  => 'address',
            'rules'  => 'trim',
            'errors' => array(
                'required'   => 'please enter %s',
                )
        ),
        array(
            'field'  => 'city',
            'label'  => 'city',
            'rules'  => 'trim',
            'errors' => array(
                'required'   => 'please enter %s',
                )
        ),
        array(
            'field'  => 'state',
            'label'  => 'state',
            'rules'  => 'trim',
            'errors' => array(
                'required'   => 'please enter %s',
                )
        ),
        array(
            'field'  => 'pincode',
            'label'  => 'pin/zip code',
            'rules'  => 'trim',
            'errors' => array(
                'required'   => 'please enter %s',
                )
        ),
        array(
            'field'  => 'occupation',
            'label'  => 'occupation',
            'rules'  => 'trim',
            'errors' => array(
                'required'   => 'please enter client %s',
                )
        ),
        array(
            'field'  => 'organization',
            'label'  => 'organization',
            'rules'  => 'trim',
            'errors' => array(
                'required'   => 'please enter client %s',
                )
        ),
        array(
            'field'  => 'designation',
            'label'  => 'designation',
            'rules'  => 'trim',
            'errors' => array(
                'required'   => 'please enter client %s',
                )
        ),
        array(
            'field'  => 'source',
            'label'  => 'source',
            'rules'  => 'trim|required',
            'errors' => array(
                'required'   => 'please select client %s',
                )
        ),
    );
    return $error;
}