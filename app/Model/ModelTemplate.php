<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelTemplate extends Model
{
    protected $table = 'model_templates';

    protected $guarded = array();

    public function templateType(){
         return $this->hasOne('App\ModelTemplateType', 'id', 'model_type_id');
    }
    
    private $availableKeys = [
        "common" => [
            "contract.house" => "Inmueble - Título",
            "contract.house.province" => "Inmueble - Provincia",
            "contract.house.town" => "Inmueble - Población",
            "contract.house.street" => "Inmueble - Calle",
            "contract.house.street_number" => "Inmueble - Número de calle",
            "contract.house.get_floor_display" => "Inmueble - Piso (planta)",
            "contract.house.door" => "Inmueble - Puerta",
            "contract.house.block" => "Inmueble - Bloque",
            "contract.house.area" => "Inmueble - Área (m2)",
            "contract.house.ref_number" => "Inmueble - Referencia Catastral",
            "contract.agency.name" => "Agencia - Nombre",
            "contract.agency.address" => "Agencia - Dirección",
            "contract.agency.email" => "Agencia - Email",
            "contract.agreement_date.day" => "Fecha contrato (día)",
            "contract.agreement_date.month" => "Fecha contrato (mes)",
            "contract.agreement_date.year" => "Fecha contrato (año)"
        ],
        "payment" => [
            "contract.start_date.day" => "Fecha de inicio del alquiler (día)",
            "contract.start_date.month" => "Fecha de inicio del alquiler (mes)",
            "contract.start_date.year" => "Fecha de inicio del alquiler (año)",
            "contract.max_years_extend_time" => "Número de años que se puede extender el contrato",
            "contract.max_days_warn_revoke" => "Días para avisar de la revocación del contrato",
            "contract.rent_amount_year" => "Valor del alquiler por año - Número",
            "contract.rent_amount_year_spelled_out" => "Valor del alquiler por año - Letra",
            "contract.rent_amount_month" => "Valor del alquiler por mes - Número",
            "contract.rent_amount_month_spelled_out" => "Valor del alquiler por mes - Letra",
            "contract.first_payment" => "Valor del pago inicial - Número",
            "contract.first_payment_spelled_out" => "Valor del pago inicial - Letra",
            "contract.first_payment_month" => "Valor del primer pago mensual - Número",
            "contract.first_payment_year" => "Valor del orimer pago anual - Número",
            "contract.next_payment_date.day" => "Fecha del próximo pago (día)",
            "contract.next_payment_date.month" => "Fecha del próximo pago (mes) ",
            "contract.next_payment_date.year" => "Fecha del próximo pago (año) ",
            "contract.bond" => "Valor de la fianza - Número",
            "contract.bond_spelled_out" => "Valor de la fianza - Letra",
            "contract.deposit" => "Valor del aval - Número",
            "contract.deposit_text" => "Valor del aval - Letra",
            "contract.current_water_meter" => "Estado del contador de agua",
            "contract.current_gas_meter" => "Estado del contador de gas",
            "contract.current_electricity_meter" => "Estado del contador de electricidad",
            "contract.lessor.name" => "Arrendador - Nombre",
            "contract.lessor.nif" => "Arrendador - NIF",
            "contract.lessor.street" => "Arrendador - Calle",
            "contract.lessor.city" => "Arrendador - Población",
            "contract.lessee_1.name" => "Arrendatario 1 - Nombre",
            "contract.lessee_2.name" => "Arrendatario 2 - Nombre",
            "contract.lessee_3.name" => "Arrendatario 3 - Nombre",
            "contract.lessee_1.nif" => "Arrendatario 1 - NIF",
            "contract.lessee_2.nif" => "Arrendatario 2 - NIF",
            "contract.lessee_3.nif" => "Arrendatario 3 - NIF",
            "contract.lessee_1.street" => "Arrendatario 1 - Calle",
            "contract.lessee_2.street" => "Arrendatario 2 - Calle",
            "contract.lessee_3.street" => "Arrendatario 3 - Calle",
            "contract.lessee_1.city" => "Arrendatario 1 - Población",
            "contract.lessee_2.city" => "Arrendatario 2 - Población",
            "contract.lessee_3.city" => "Arrendatario 3 - Población",
            "contract.limit_date_title_land_granting.day" => "Fecha tope del otorgamiento de la escritura pública de compraventa (día)",
            "contract.limit_date_title_land_granting.month" => "Fecha tope del otorgamiento de la escritura pública de compraventa (mes)",
            "contract.limit_date_title_land_granting.year" => "Fecha tope del otorgamiento de la escritura pública de compraventa (año)",
            "contract.down_payment_amount" => "Valor de arras - Número",
            "contract.down_payment_amount_spelled_out" => "Valor de arras - Letra",
            "contract.selling_amount" => "Valor de compraventa - Número",
            "contract.selling_amount_spelled_out" => "Valor de compraventa - Letra",
            "contract.selling_amount_remaining" => "Valor de compraventa restante - Número",
            "contract.selling_amount_remaining_spelled_out" => "Valor de compraventa restante - Letra",
            "contract.owner1.name" => "Propietario 1 - Nombre",
            "contract.owner2.name" => "Propietario 2 - Nombre",
            "contract.owner1.nif" => "Propietario 1 - NIF",
            "contract.owner2.nif" => "Propietario 2 - NIF",
            "contract.owner1.street" => "Propietario 1 - Calle",
            "contract.owner2.street" => "Propietario 2 - Calle",
            "contract.owner1.city" => "Propietario 1 - Población",
            "contract.owner2.city" => "Propietario 2 - Población",
            "contract.buyer1.name" => "Comprador 1 - Nombre",
            "contract.buyer2.name" => "Comprador 2 - Nombre",
            "contract.buyer1.nif" => "Comprador 1 - NIF",
            "contract.buyer2.nif" => "Comprador 2 - NIF",
            "contract.buyer1.street" => "Comprador 1 - Calle",
            "contract.buyer2.street" => "Comprador 2 - Calle",
            "contract.buyer1.city" => "Comprador 1 - Población",
            "contract.buyer2.city" => "Comprador 2 - Población"
        ]
    ];

    public function getAvailableKeysAttribute(){
        return array(
        
        
        "contract.commission_amount" => "Valor de comisión - Número",
        "contract.seller1.name" => "Vendedor 1 - Nombre",
        "contract.seller2.name" => "Vendedor 2 - Nombre",
        "contract.seller1.nif" => "Vendedor 1 - NIF",
        "contract.seller2.nif" => "Vendedor 2 - NIF",
        "contract.seller1.street" => "Vendedor 1 - Calle",
        "contract.seller2.street" => "Vendedor 2 - Calle",
        "contract.seller1.city" => "Vendedor 1 - Población",
        "contract.seller2.city" => "Vendedor 2 - Población",
        "contract.seller1.name" => "Vendedor - nombre",
        "contract.seller1.nif" => "Vendedor - NIF",
        "contract.seller1.street" => "Vendedor - Calle",
        "contract.seller1.city" => "Vendedor - Población",
        "contract.down_payment_amount" => "Valor de arras",
        "contract.buyer1.name" => "Comprador - nombre",
        "contract.buyer1.nif" => "Comprador - NIF",
        "contract.buyer1.street" => "Comprador - Calle",
        "contract.buyer1.city" => "Comprador - Población",
        "contract.visitor.name" => "Visitante - nombre",
        "contract.visitor.phone" => "Visitante - teléfono",
        "contract.visitor.email" => "Visitante - email",
        "contract.visitor.nif" => "Visitante - NIF",
        "contract.commercial" => "Comercial - nombre",
        "contract.agreement_time" => "Fecha contrato (hora:minutos)");
    } 
}
