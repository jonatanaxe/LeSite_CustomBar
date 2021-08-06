<?php
/**
 * Custom Bar Customer Group
 *
 * @package LeSite_CustomBar
 * @author Jonatan Machado <jonatanaxe@lesite.ca>
 */
namespace LeSite\CustomBar\Helper;

class Helper extends \Magento\Framework\View\Element\Template
{
    protected $storeManagerInterface;
    protected $filterProvider;

    /**
    * @param \Magento\Framework\View\Element\Template\Context $context
    * @param array $data
    */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManagerInterface,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        array $data = []
    ){
        parent::__construct($context, $data);
        $this->storeManagerInterface = $storeManagerInterface;
        $this->filterProvider = $filterProvider;
    }


    public function getProperty($prop) {
        return $this->_scopeConfig->getValue($prop, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    public function filterOutputHtml($string)
    {
        return $this->filterProvider->getPageFilter()->filter($string);
    }
}
