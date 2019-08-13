<?php
     
    class Auriga_Footertip_Block_Adminhtml_Footertip_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
    {
        protected function _prepareForm()
        {
            $form = new Varien_Data_Form();
            $this->setForm($form);
            $fieldset = $form->addFieldset('footertip_form', array('legend'=>Mage::helper('footertip')->__('Item information')));
           
            $fieldset->addField('title', 'text', array(
                'label'     => Mage::helper('footertip')->__('Title'),
                'class'     => 'required-entry',
                'required'  => true,
                'name'      => 'title',
            ));
     
            $fieldset->addField('status', 'select', array(
                'label'     => Mage::helper('footertip')->__('Status'),
                'name'      => 'status',
                'values'    => array(
                    array(
                        'value'     => 1,
                        'label'     => Mage::helper('footertip')->__('Active'),
                    ),
     
                    array(
                        'value'     => 0,
                        'label'     => Mage::helper('footertip')->__('Inactive'),
                    ),
                ),
            ));
           
            $fieldset->addField('content', 'editor', array(
                'name'      => 'content',
                'label'     => Mage::helper('footertip')->__('Content'),
                'title'     => Mage::helper('footertip')->__('Content'),
                'style'     => 'width:98%; height:400px;',
                'wysiwyg'   => false,
                'required'  => true,
            ));
           
            if ( Mage::getSingleton('adminhtml/session')->getfootertipData() )
            {
                $form->setValues(Mage::getSingleton('adminhtml/session')->getFootertipData());
                Mage::getSingleton('adminhtml/session')->setFootertipData(null);
            } elseif ( Mage::registry('footertip_data') ) {
                $form->setValues(Mage::registry('footertip_data')->getData());
            }
            return parent::_prepareForm();
        }
    }