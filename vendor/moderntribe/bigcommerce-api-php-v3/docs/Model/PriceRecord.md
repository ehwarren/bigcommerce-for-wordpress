# PriceRecord

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**price_list_id** | **int** | The Price List with which this price set is associated. | [optional] 
**variant_id** | **int** | The variant with which this price set is associated. Either variant_id or sku is required. | [optional] 
**sku** | **string** | The variant with which this price set is associated. Either sku or variant_id is required. | [optional] 
**currency** | **string** | The 3-letter currency code with which this price set is associated. | [optional] 
**price** | **double** | The list price for the variant mapped in a Price List. Overrides any existing or Catalog list price for the variant/product. | [optional] 
**sale_price** | **double** | The sale price for the variant mapped in a Price List. Overrides any existing or Catalog sale price for the variant/product. If empty, the sale price will be treated as not being set on this variant. | [optional] 
**retail_price** | **double** | The retail price for the variant mapped in a Price List. Overrides any existing or Catalog retail price for the variant/product.  If empty, the retail price will be treated as not being set on this variant. | [optional] 
**map_price** | **double** | The MAP (Manufacturer&#39;s Advertised Price) for the variant mapped in a Price List. Overrides any existing or Catalog MAP price for the variant/product. If empty, the MAP price will be treated as not being set on this variant. | [optional] 
**calculated_price** | **double** | The price of the variant as seen on the storefront if a price record is in effect. It will be equal to the &#x60;sale_price&#x60;, if set, and the &#x60;price&#x60; if there is not a &#x60;sale_price&#x60;.  Read only. | [optional] 
**date_created** | [**\DateTime**](\DateTime.md) | The date on which the Price entry was created. | [optional] 
**date_modified** | [**\DateTime**](\DateTime.md) | The date on which the Price entry was created. | [optional] 
**product_id** | **int** | The id of the &#x60;Product&#x60; this &#x60;Price Record&#x60;&#39;s variant_id is associated with.  Read only. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

