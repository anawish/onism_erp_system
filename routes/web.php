<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::resource('sale','SalesController');
Route::resource('newinvoice','NewInvoiceController');
Route::get('shippingDetail/{id}','NewInvoiceController@shippingDetail');
Route::get('searchproduct/{product}','NewInvoiceController@product');
Route::get('customerdetail/{id}','NewInvoiceController@customerdetail');
Route::get('productDetail/{id}','NewInvoiceController@productDetail');
Route::resource('managesaleinvoice','ManageSaleInvoiceController');
Route::get('invoicedel/{id}','ManageSaleInvoiceController@destroy');
Route::get('pdf/{id}','ManageSaleInvoiceController@pdf');
Route::get('createinvoice/{id}','SaleInvoiceController@createinvoice');
Route::resource('printinvoice','SaleInvoiceController');
Route::post('createinvoice/Updatecourierstatus','SaleInvoiceController@Updatecourierstatus');
Route::post('createinvoice/shippingAddress','SaleInvoiceController@shippingAddress');

Route::resource('order','OrderController');
Route::get('item/{pname}','OrderController@item');
Route::get('itemdetail/{id}','OrderController@itemdetail');
Route::get('orderinvoice/{id}','OrderController@orderinvoice');
Route::get('orderpreview/{id}','OrderController@orderpreview');
Route::get('downloadpdf/{id}','OrderController@downloadpdf');

Route::resource('customer','CustomerController');
Route::resource('createqouta','NewQoutaController');
Route::get('customerinfo/{id}','NewQoutaController@customerinfo');
Route::resource('quoteinvoice','QuoteInvoiceController');
Route::get('preview/quote/{id}','QuoteInvoiceController@previewquote');
Route::resource('qoute','ManageQuotaController');
Route::get('quotepdf/{id}','ManageQuotaController@pdf');
Route::get('qoutedel/{id}','ManageQuotaController@destroy');
Route::resource('manageinvoice','ManageInvoiceController');
Route::resource('pos','PosController');

Route::resource('purchase','PurchaseController');
Route::resource('viewinvoice','ViewaInvoiceController');
Route::resource('product','ProductController');
//Route::resource('product','ProductController');
Route::resource('products','ProductManageController');

Route::get('remove/{id}','ProductManageController@destroy');
Route::resource('productcategory','ProductCategoryController');
Route::get('delete/{id}','ProductCategoryController@destroy');
Route::get('/get_subcats','CreateItemController@get_subcats');
Route::resource('addcategory','ProductCategoryController');
Route::resource('productdetail','ProductDetailController');
Route::resource('warehouse','WarehouseController');
Route::get('del/{id}','WarehouseController@destroy');
Route::resource('createwarehouse','CreateWarehouseController');

Route::resource('purchaseorder','PurchaseorderController');
Route::post('purchaseorder/clientinfo','PurchaseorderController@clientinfo');
Route::get('SupplierDetail/{id}','PurchaseorderController@SupplierDetail');
Route::get('productsearch/{searchpro}','PurchaseorderController@productsearch');
Route::get('productDet/{id}','PurchaseorderController@ProductDeatail');
Route::resource('purchaseinvoice','PurchaseInvocieController');
Route::get('getinvoice/{id}','PurchaseInvocieController@getinvoice');
Route::post('getinvoice/makepayment','PurchaseInvocieController@makepayment');
// Route::post('/changestatus','PurchaseInvocieController@changestatus');
// Route::post('/form/update','PurchaseInvocieController@FormUpdate');
Route::resource('managepurchase','ManagepurchaseController');
Route::get('purchasedel/{id}','ManagepurchaseController@destroy');
Route::get('purchasepdf/{id}','ManagepurchaseController@pdf');
Route::resource('stockreturn','StockReturnController');
Route::resource('viewstock','ViewReturnStockController');
Route::resource('addprocategory','Add_product_categoryController');
Route::resource('inventory','InventoryController');
Route::resource('addsupplier','AddSupplierController');
Route::resource('supplier','PurchaseSupplierController');
Route::resource('grn','GRNController');
Route::get('grnpdf/{id}','GRNController@pdf');
Route::get('printgrn/{id}','GRNController@print');
Route::resource('grnprint','GrnPdfController');
Route::get('download/{id}','GrnPdfController@printdownload');
Route::resource('crm','CRMController');
Route::resource('client','ClientController');
Route::post('SearchClient','ClientController@SearchClient');
Route::post('client/uploadimg','ClientController@uploadimg');
Route::get('clientdel/{id}','ClientController@destroy');
Route::get('clientinvoice/{id}','ClientController@invoicesDetail');
Route::get('invociedelete/{id}','ClientController@delete');
Route::get('transcations/{id}','ClientController@transcation');
Route::get('transcations/view/{id}','ClientController@transcationDetail');
Route::get('balance/{id}','ClientController@balance');
Route::resource('balance','BalanceController');
Route::resource('clientgroup','ClientGroupController');
Route::get('client/edit/{id}','ClientGroupController@clientedit');
Route::get('groupdel/{id}','ClientGroupController@destroy');
Route::resource('suppliers','SupplierController');
Route::get('delete/suppliers/{id}','SupplierController@destroy');
Route::get('PODetail/{id}','SupplierController@PODetail');
Route::get('supplier/pdf/{id}','SupplierController@pdf');
Route::get('supplier/transcation/{id}','SupplierController@transcation');
Route::get('supplier/view/{id}','SupplierController@transcationDetail');
Route::get('supplier/delete/{id}','SupplierController@delete');

Route::resource('account','AccountController');
Route::get('viewbalance/{id}','AccountController@viewbalance');
Route::post('viewbalance/daterange','AccountController@daterange');
Route::get('account/viewcustomer','AccountController@viewcustomer');
Route::post('account/CustomerDateFilter','AccountController@CustomerDateFilter');
Route::post('account/DateFilter','AccountController@DateFilter');
Route::post('account/trialdate','AccountController@trialdate');
Route::resource('generaledger','GeneralLedgerController');
Route::post('generaledger/dateRange','GeneralLedgerController@dateRange');
Route::resource("vendorledger",'VendorLedgerController');
Route::resource('generaltransaction','GeneralTransactionController');
Route::get('showtransaction/{pid}','GeneralTransactionController@showtransaction');
Route::get('viewtransaction','GeneralTransactionController@ViewTransaction');
Route::get('downloadPdf/{id}','GeneralTransactionController@downloadPdf');