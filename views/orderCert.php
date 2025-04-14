<form class="create-cert-form">
    <div class="first-info">
        <input type="text"  class="text-input js-virtual-keyboard" data-kioskboard-type="all" data-kioskboard-placement="bottom" data-kioskboard-specialcharacters="true" name="surname" placeholder="Фамилия" required />
        <input type="text"  class="text-input js-virtual-keyboard" data-kioskboard-type="all" data-kioskboard-placement="bottom" data-kioskboard-specialcharacters="true" name="name" placeholder="Имя" required />
        <input type="text"  class="text-input js-virtual-keyboard" data-kioskboard-type="all" data-kioskboard-placement="bottom" data-kioskboard-specialcharacters="true" name="lastname" placeholder="Отчество" required />
    </div>
    <p class="lable-cert">Ваша группа</p>
    <select class="select-opt" name="group" placeholder="Группа">
        <?php
            require_once('../php/connectdb.php');
            $group = $conn->prepare("SELECT `idgroup` FROM `group`");
            $group->execute();
            foreach ($group as $row) {
                echo '<option value="'.$row['idgroup'].'">'.$row['idgroup'].'</option>';
            }
        ?>
    </select>
    <p class="lable-cert">Какая справка необходима</p>
    <select class="select-opt select-cert" name="typeCert">
        <?php
            require_once('../php/connectdb.php');
            $typeCert = $conn->prepare("SELECT `idTypeCert` FROM `typecert`");
            $typeCert->execute();
            foreach ($typeCert as $row) {
                echo '<option value="'.$row['idTypeCert'].'">'.$row['idTypeCert'].'</option>';
            }
        ?>
    </select>
    <div class="date-rate">
        <span>От:</span> <input type="date" name="dateRateStart" class="text-input"/>
        <span>До:</span> <input type="date" name="dateRateEnd" class="text-input"/>
    </div>
    <input type="submit" value="Заказать" id="createOrder"/>
</form>