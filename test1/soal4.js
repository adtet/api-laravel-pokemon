class Ship {
    constructor(name, type, length) {
        this.name = name;
        this.type = type;
        this.length = length;
    }

    getDescription() {
        return `Name: ${this.name}, Type: ${this.type}, Length: ${this.length} feet`;
    }
}

class MotorBoat extends Ship {
    constructor(name, length, engineType) {
        super(name, "Motor Boat", length);
        this.engineType = engineType;
    }

    getDescription() {
        return `${super.getDescription()}, Engine Type: ${this.engineType}`;
    }
}

class Sailboat extends Ship {
    constructor(name, length, sailType) {
        super(name, "Sailboat", length);
        this.sailType = sailType;
    }

    getDescription() {
        return `${super.getDescription()}, Sail Type: ${this.sailType}`;
    }
}

class Yacht extends Ship {
    constructor(name, length, cabins) {
        super(name, "Yacht", length);
        this.cabins = cabins;
    }

    getDescription() {
        return `${super.getDescription()}, Cabins: ${this.cabins}`;
    }
}

const motorBoat = new MotorBoat("Speedster", 30, "Outboard");
const sailboat = new Sailboat("SailMaster", 40, "Sloop");
const yacht = new Yacht("LuxuryLiner", 60, 5);

console.log(motorBoat.getDescription());
console.log(sailboat.getDescription());
console.log(yacht.getDescription());
