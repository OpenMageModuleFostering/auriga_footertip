<?php
     
    class Auriga_Footertip_Block_Adminhtml_Footertip_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
    {
         protected function _prepareForm()
        {	
            $form = new Varien_Data_Form(array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                'method' => 'post',
        ));
 
        $form->setUseContainer(true);
            $this->setForm($form);
            $fieldset = $form->addFieldset('footertip_form', array('legend'=>Mage::helper('footertip')->__('Tip information')));
    
            $fieldset->addField('footertip','editor', array(
                'label'     => Mage::helper('footertip')->__('Footer tip'),
                'required'  => true,
				'style'     => 'width:200%; height:100px;',
                'name'      => 'footertip',
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
