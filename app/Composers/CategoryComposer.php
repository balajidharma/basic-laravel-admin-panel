<?php


namespace App\Composers;



use App\Models\Ecom\CategoryProducts;

class CategoryComposer
{
    public function compose($view)
    {
        //Add your variables
        $view->with('categories_products', $this->getDemandsNotificationCount());
    }

    /**
     * get new demands count
     *
     * @return integer
     */
    private function getDemandsNotificationCount()
    {
        return CategoryProducts::get();
    }
}
